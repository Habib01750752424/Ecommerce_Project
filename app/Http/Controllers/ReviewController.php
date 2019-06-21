<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class ReviewController extends Controller
{
    public function LoginUser()
    {
        return view('pages.user_login');
    }

    public function UserLogin(Request $request)
    {
        $validatedData = $request->validate([
        'email' => 'required',
        'password' => 'required',
        ]);

        $user_email=$request->email;
        $user_password=md5($request->password);
        // echo $user_email;
        // echo $user_password;
        $result=DB::table('tbl_users')
            ->where('email',$user_email)
            ->where('password',$user_password)
            ->first();
            if($result){

                 //return Redirect::to('/dashboard');
                 return Redirect::to('/call-review-rating-page');              
            }else{

                Session::put('message','Email or Password Invalid');
                return Redirect::to('/login-user');
            }
            
    }


    public function SignUp()
    {
        return view('pages.user_sign_up');
    }

    public function Register(Request $request)
    {
        $validatedData = $request->validate([
        'name'         => 'required|max:50',
        'email' => 'required|unique:tbl_users|max:255',
        'password'     => 'required',
        ]);

        Session::put('name',$request->name);
        Session::put('email',$request->email);
        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['password']=md5($request->password);

        //return $data;

        DB::table('tbl_users')->insert($data);
        Session::put('message','You Registered successfully !!');

        return redirect('/signup');
         //return redirect('/view_product/'.$review_id);
    }


    public function CallReviewRatingPage()
    {
        return view('pages.review_rating');
    }

    public function insert_review(Request $request, $product_id)
    {
        Session::put('from_rating_page_id',$product_id);
        //$from_rating_page_id=Session::get('from_rating_page_id');
        //echo $from_rating_page_id;
    	$validatedData = $request->validate([
        //'name'         => 'required|max:255',
        //'email'        => 'required|max:255',
        'rating_type'  => 'required',
        'review'       => 'required',
        ]);

        Session::put('email',$request->email);
        $review_id=Session::get('review_id');
        $data=array();
        $data['review_id']=$review_id;
    	$data['name']=$request->name;
    	$data['email']=$request->email;
    	$data['review']=$request->review;
    	$data['rating_type']=$request->rating_type;

    	//return $data;

    	DB::table('tbl_review')->insert($data);
    	//Session::put('message','Review added successfully !!');
    
    	//return $review_id;
    	 return redirect('/view_product/'.$review_id);

    }

    public function ReviewDetails()
    {
    	// Session::flush();
    	$review_id=Session::get('review_id');
    	$review_total = DB::table('tbl_review')
            ->where('review_id',$review_id)
            ->get();
            // echo "<pre>";
            // print_r($review_total);
            // echo "</pre>"

            // foreach ($review_total as $review) {
            // 	echo $review->rating_type;
            // }
            //return $count;

            $count = count($review_total);
            return view('pages.review_details')->with('review_total',$review_total)->with('count', $count);
    }
}
