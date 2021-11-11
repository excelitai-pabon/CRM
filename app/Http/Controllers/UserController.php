<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //all user
    public function index(){
        $users=User::all();
        return view('user.all',compact('users'));
    }

    // user add page show
    public function create(){
        return view('user.create');

    }

    //user store
    public function store(UserRequest $request){
        //  dd($request->all());

        $userData=[
            'file_no'=>$request->file_no,
            'member_name'=>$request->member_name,
            'father_name'=>$request->father_name,
            'mother_name'=>$request->mother_name,
            'husband_name'=>$request->husband_wife_name,
            'email'=>$request->email,
            'permanent_address'=>$request->permanent_address,
            'mailing_address'=>$request->mailing_address,
            'phone_no_1'=>$request->phone_1,
            'phone_no_2'=>$request->phone_2,
            'date_of_birth'=>$request->date_of_birth,
            'national_id'=>$request->national_id,
            'profession'=>$request->profession,
            'office_address'=>$request->office_address,
            'designation'=>$request->designation,
            'nominee_name'=>$request->nominee_name,
            'relation_with_mominee'=>$request->relation_with_nominee,
            'building_no'=>$request->building_no,
            'password'=>Hash::make($request->password),
            'created_at'=>Carbon::now()->toDateTimeString()
        ];

        //member image
        if($request->hasFile('member_image')){
            $userData['member_image'] = $this->uploadImageSize('user',$request->member_image,'user',150,160);
        }
        //nominee image
        if($request->hasFile('nominee_image')){
            $userData['nominee_image'] = $this->uploadImageSize('nominee',$request->nominee_image,'nominee',150,160);
        }

        $user=User::create($userData);

        if($user){
            Session::flash('success',"Successfully Add  User");
            return redirect()->back();
        }else{
           Session::flash('error',"Failed To Add User");
            return redirect()->back();
        }

    }

    public function edit(User $user){
        // dd($user);
       return view('user.edit',compact('user'));

    }

    public function update(UserRequest $request, User $user){
//dd($request->all());
        $userData=[
            'file_no'=>$request->file_no,
            'member_name'=>$request->member_name,
            'father_name'=>$request->father_name,
            'mother_name'=>$request->mother_name,
            'husband_name'=>$request->husband_wife_name,
            'email'=>$request->email,
            'permanent_address'=>$request->permanent_address,
            'mailing_address'=>$request->mailing_address,
            'phone_no_1'=>$request->phone_1,
            'phone_no_2'=>$request->phone_2,
            'date_of_birth'=>$request->date_of_birth,
            'national_id'=>$request->national_id,
            'profession'=>$request->profession,
            'office_address'=>$request->office_address,
            'designation'=>$request->designation,
            'nominee_name'=>$request->nominee_name,
            'relation_with_mominee'=>$request->relation_with_nominee,
            'building_no'=>$request->building_no,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ];

        //member image
        if($request->hasFile('member_image')){
            if(file_exists(public_path($user->member_image))){
                unlink(public_path($user->member_image));
            }
            $userData['member_image'] = $this->uploadImageSize('user',$request->member_image,'user',150,160);
        }
        //nominee image
        if($request->hasFile('nominee_image')){
            if(file_exists(public_path($user->nominee_image))){
                unlink(public_path($user->nominee_image));
            }
            $userData['nominee_image'] = $this->uploadImageSize('nominee',$request->nominee_image,'nominee',150,160);
        }

        $user_update=$user->update($userData);

        if($user_update){
            Session::flash('success',"Successfully Update  User");
            return redirect()->back();
        }else{
           Session::flash('error',"Failed To Update User");
            return redirect()->back();
        }


    }

    public function destroy(User $user){

        if(!empty($user->member_image) && file_exists(public_path($user->member_image))){
            unlink(public_path($user->member_image));
            if(!empty($user->nominee_image) && file_exists(public_path($user->nominee_image))){
                unlink(public_path($user->nominee_image));
            }
            $delete=$user->delete();
        }else{
            $delete=$user->delete();
        }

        if($delete){
            return response()->json(['success'=>"Successfully Delete Warehouse Staff"],200);
        }else{
            return response()->json(['error'=>"Failed Delete Warehouse Staff"],500);
        }


    }




}
