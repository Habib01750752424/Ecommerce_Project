<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class BranchAdminController extends Controller
{
    public function CreateBranch()
    {
    	return view('admin.add_branch_admin');
    }


    public function BranchAdmin()
    {
     //$this->AdminAuthCheck();

     return view('admin.all_branch_admin');

    }

    public function SaveBranchAdmin(Request $request)
    {
    	$this->validate($request, [
        'name'          => 'required|max:255',
        'email'         => 'required|unique:branch_admins|max:255',
        'mobile_number' => 'required|unique:branch_admins|max:255',
        'password'      => 'required',
        //'photo'         => 'required',
        ]);

        $data=array();
        $data['name']          =$request->name;
        $data['email']         =$request->email;
        $data['password']      =md5($request->password);
        $data['mobile_number'] =$request->mobile_number;
        $image                 =$request->photo;

        if ($image) {
            $image_name= str_random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/Branch/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['photo']=$image_url;
                $branch_admin=DB::table('branch_admins')
                         ->insert($data);
              if ($branch_admin) {
                 Session::put('message','New Branch Admin Added Successfully');
                return Redirect::to('/all-branch-admin');                      
             }else{
              Session::put('message','Something went wrong, Please Check Inserting Details');
                return Redirect::to('/create-branch');
             }      
                
            }else{
              Session::put('message','Something went wrong, Please Check Inserting Details');
                return Redirect::to('/create-branch');
            }
        }else{
              Session::put('message','Something went wrong, Please Check Inserting Details');
                return Redirect::to('/create-branch');
        }
    }

    public function EditBranchAdmin($id)
    {
        $edit=DB::table('branch_admins')
             ->where('id',$id)
             ->first();
        return view('admin.edit_branch_admin', compact('edit'));
    }

    public function UpdateBranchAdmin(Request $request, $id)
    {
        $this->validate($request, [
        'name'          => 'required|max:255',
        'email'         => 'required|max:255',
        'mobile_number' => 'required|max:13',

        ]);

        $data=array();
        $data['name']          = $request->name;
        $data['email']         = $request->email;
        $data['mobile_number'] = $request->mobile_number;
        $image                 =$request->photo;

        if ($image) {
       $image_name=str_random(20);
       $ext=strtolower($image->getClientOriginalExtension());
       $image_full_name=$image_name.'.'.$ext;
       $upload_path='public/Branch/';
       $image_url=$upload_path.$image_full_name;
       $success=$image->move($upload_path,$image_full_name);
       if ($success) {
          $data['photo']=$image_url;
             $img=DB::table('branch_admins')->where('id',$id)->first();
             $image_path = $img->photo;
             $done=unlink($image_path);
          $user=DB::table('branch_admins')->where('id',$id)->update($data); 
         if ($user) {
                Session::put('message','Branch Admin Updated Successfully');
                return Redirect::to('/all-branch-admin');                      
            }else{
              Session::put('message','Something went wrong, Please Check Updating Details');
                return Redirect::to('/all-branch-admin');
             } 
          }
      }else{
        $oldphoto=$request->old_photo;
         if ($oldphoto) {
          $data['photo']=$oldphoto;  
          $user=DB::table('branch_admins')->where('id',$id)->update($data); 
         if ($user) {
                Session::put('message','Branch Admin Updated Successfully');
                return Redirect::to('/all-branch-admin');
            }else{
              Session::put('message','You Have Not Change Branch Admin  Any Information, You Have Putted Before Data');
                return Redirect::to('/all-branch-admin');
             } 
          }
       }

    }


    public function DeleteBranchAdmin($id)
    {
        $delete=DB::table('branch_admins')
                ->where('id',$id)
                ->first();
         $photo=$delete->photo;
         unlink($photo);
         $dltuser=DB::table('branch_admins')
                  ->where('id',$id)
                  ->delete();
         if ($dltuser) {
                Session::put('message','Branch Admin Deleted Successfully');
                return Redirect::to('/all-branch-admin');                      
             }else{
              Session::put('message','Something Went Wrong, Please Check Deleting Details');
                return Redirect::to('/all-branch-admin');
             }
    }

    public function LoginBranchAdmin($id)
    {
        //Session::flush();
        Session::put('specific_login_id',$id);
        Session::put('branch_admin_name',null);
        session::put('branch_admin_email',null);
        session::put('branch_admin_id',null);

        //$BranchAdminIid = Session::get('branch_admin_id');

        return view('branch_admin_login');
    }

    public function BranchAdminDashboard(Request $request)
    {
        $email=$request->email;
        $password=md5($request->password);
        $specific_login_id = Session::get('specific_login_id');
        
        $result=DB::table('branch_admins')
                ->where('email',$email)
                ->where('password',$password)
                ->where('id',$specific_login_id)
                ->first();
                //echo $result->id;
                if($result){
                    
                    Session::put('branch_admin_name',$result->name);
                    Session::put('branch_place',$result->place);
                    Session::put('branch_admin_email',$result->email);
                    Session::put('branch_admin_id',$result->id);
                    $id = Session::get('branch_admin_id');
                    $email = Session::get('branch_admin_email');
                    // return view('admin.dashboard')->with('branch_id',$id)->with('branch_email',$email);
                     return Redirect::to('/dashboard');              
                }else{
                   //$BranchAdminIid = Session::get('branch_admin_id');
                    Session::put('message','Email or Password Invalid');
                    return redirect('/login-branch-admin/'.$specific_login_id);
                }
    }
}
// return redirect('/seller/sms/'.$id);

// ->route('login_branch',['id'=>3])