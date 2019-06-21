<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Cart;
use Illuminate\Support\Facades\Redirect;

class CardController extends Controller
{
    public function index()
    {
        return view('admin.add_card');
    }

    public function save_card(Request $request)
    {
        $this->validate($request, [
        'number' => 'required|unique:tbl_card|min:6|max:6',
        'balance' => 'required|max:4',
        ]);

        $data=array();
        $data['number']=$request->number;
        $data['balance']=$request->balance;
        $data['status']=$request->status;

        DB::table('tbl_card')->insert($data);
        Session::put('message','Card added successfully !!');
        return Redirect::to('/add-card');
    }

    public function all_card()
    {
        $cards=DB::Table('tbl_card')->get();
        return view('admin.all_card')->with('cards',$cards);
    }

    public function unactive_card($id)
    {
        DB::table('tbl_card')
            ->where('id',$id)
            ->update(['status' =>0]);
        Session::put('message','Card Unactive Successfully !!');
            return Redirect::to('/all-card');
    }


    public function active_card($id)
    {
        DB::table('tbl_card')
            ->where('id',$id)
            ->update(['status' =>1]);
        Session::put('message','Card active Successfully !!');
            return Redirect::to('/all-card');
    }


    public function SaveBalance(Request $request)
    { 
        $balance = $request->balance;
        //return gettype($balance);

        $data = DB::table('tbl_card')->where('balance',$balance)
        ->where('status',1)->first();

        if ($data) {
            return view('pages.add_number', compact('data'));
        }else{
            Session::put('message','Sorry !! There is no available this card');
            return Redirect::to('/buy-your-card');
        }
        

         
    }



    public function SaveNumber(Request $request)
    {
        $card_number = $request->number;
        $customer_email = Session::get('cus_email');
        $shipping_email = Session::get('shipping_email');

        $data = DB::table('tbl_card')->where('number',$card_number)
        ->where('status',1)->first();
        
        if ($data) {

            $balance = $data->balance;
            //$number = $data->number;
            $data=array();
            $data['balance']=$balance;
            $data['email']=$customer_email;

               $taka = DB::table('balance')->insert($data);
               $balnce = DB::table('balance')
               ->where('email',$shipping_email)->get();


               DB::table('tbl_card')
            ->where('number',$card_number)
            ->update(['status' =>0]);


               return view('pages.account_balance', compact('balnce'));
           
            }else{
               Session::put('message','Sorry !! This card is already used.Now purchase new card...');
               return Redirect::to('/buy-your-card');
          }
        //return view('pages.account_balance');
        
    }


    public function BuyProduct()
    {
        return view('pages.buy_product');
    }

    public function UserProfile()
    {
        return view('pages.user_profile');
    }

    public function BuyYourCard()
    {
    	return view('pages.card');
    }

    public function BuyBook()
    {
        return view('pages.buy_book');
    }

    public function BuyBookDetails()
    {
        $cus_name = Session::get('cus_name');
        $cus_email = Session::get('cus_email');
        $cus_number = Session::get('cus_number');


         $data = DB::table('balance')->where('email',$cus_email)->get();
         $count = count($data);

         $balance_sum = 0;

        foreach ($data as $adata) {
           $balance_sum = $balance_sum + $adata->balance;
        }

        $card_tk = (double)$balance_sum; 

        $cart_total = (double)Cart::total();

        if($card_tk < $cart_total){
          Session::put('message','You have insufficient balance..Please Recharge Card in your account !!');
          return Redirect::to('/buy-your-card');
        }else{
          $remaining_account_total  = $card_tk - $cart_total;
          return Redirect::to('/buy_book');
        }

    }


    public function SubmitBalance(Request $request)
    {
    	$this->validate($request, [
        'balance' => 'required',
        ]);

        $tk = Session::get('tk');
        $str_tk = (string)$tk;
       
       // if ($str_tk[0] == '-') {
       //     return "ok";
       // }else{
       //  return "NOt OK";
       // }
        //echo  $int_tk;
        //return gettype($int_tk);
        //return $str_tk[0];

    	$data=array();
        $data['balance']=$request->balance;
        $data['rowId']=$request->rowId;

    	$balance=$request->balance;
    	$rowId=$request->rowId;

    	$taka = (int)$balance;
    	//echo gettype($taka);
    	//echo gettype($balance);

        // $cards=DB::Table('cards')->get();
        // $count = count($cards);
        // for ($i=0; $i <= $count; $i++) { 
        //     # code...
        // }
        //return $count;
        $total = Session::get('total');
        //return $total;

        while($taka <= $tk){
            $len = strlen($balance);
            $lastCharacter = $balance[$len-1];
            if ($lastCharacter == '0'){
                if ($str_tk[0] == '-') {
                    Session::put('message','Balance Card could not taken Negative taka !!');    
                    return Redirect::to('/buy-your-card');   
                }else{
                    $card=DB::table('cards')->insert($data);
                    if ($card) {
                        Session::put('message','You have successfully purchased your card !!'); 
                        return Redirect::to('/buy-your-card');
                    }else{
                        Session::put('message','Something Went Wrong, Please Check Inserting Details !!');
                        return Redirect::to('/buy-your-card');
                    }
                }
                
            }else{
                Session::put('message','Please Enter: 10, 20, 30,....,500....1500....,2000....etc !!');
                return Redirect::to('/buy-your-card');
            }
        }

        Session::put('inBalance','Please, enter balance between 10 to');
        return Redirect::to('/buy-your-card');
        }















    	// while($taka <= 20000) {
    	// 	$len = strlen($balance);
	    // 	$lastCharacter = $balance[$len-1];
	    // 	if ($lastCharacter == '0') {
	    // 		$card=DB::table('cards')->insert($data);
	    // 		if($card){
	    // 			while ($tk > -1) {
	    // 				Session::put('message','You have successfully purchased your card !!');	
	    // 			     return Redirect::to('/buy-your-card');
	    // 			}
    	// 			Session::put('message','Balance Card could not taken Negative taka !!');	
    	// 		     return Redirect::to('/buy-your-card');

	    				
	    // 		}else{
	    // 			Session::put('message','Something Went Wrong, Please Check Inserting Details !!');
	    // 			return Redirect::to('/buy-your-card');	
	    // 		}
	    // 	}else{
	    // 		Session::put('message','Please Enter: 10, 20, 30,....,500....1500....,2000....etc !!');
	    // 		return Redirect::to('/buy-your-card');	
	    // 	}
    	// }

    	//Session::put('message','Please, enter balance between 10 to 20000 taka');
    	//return Redirect::to('/buy-your-card');	
    //}


    public function BuyYourProduct()
    {
    	Session::put('BuyProduct','Thank You, You have Successfully Purchased Your Products');
    	return Redirect::to('/buy-your-card');	
    }


    public function AllBrandStatus()
    {
        $data = DB::table('brand')->get();
        return view('admin.all_brand_status')->with('brand',$data);
    }


    public function unactive_brand($id)
    {
        DB::table('brand')
            ->where('id',$id)
            ->update(['status' =>0]);
        Session::put('message','Brand Unactive Successfully !!');
            return Redirect::to('/all-brand-status');
    }


    public function active_brand($id)
    {
        DB::table('brand')
            ->where('id',$id)
            ->update(['status' =>1]);
        Session::put('message','Brand active Successfully !!');
            return Redirect::to('/all-brand-status');
    }
}
