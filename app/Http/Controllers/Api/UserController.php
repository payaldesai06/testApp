<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Auth;
use Commonhelper;

class UserController extends BaseController
{

    public function store(Request $request)
    {
        $rules = [
            'user_name'  => 'required'
        ];
        if($request->id){
            $rules['email'] = 'required|email|unique:users,email,'.$request->id;
        }
        else{
            $rules['email'] = 'required|email|unique:users,email';
            $rules['password'] = 'required|min:8|confirmed';
        }
        $validator = Validator::make($request->all(),$rules);
        if (@$validator->fails()) {
            return $this->handleError($validator->errors()->first());
        }
        $data = $request->except(['_token','token','password_confirmation']);
        if(@$data['password']){$data['password'] = \Hash::make($data['password']);}
        //insert user data
        if($request->id){
            User::where('id',$request->id)->update($data);
            Commonhelper::setCache('users');
            return $this->handleResponse([], 'User updated successfully!');
        }else{
            User::create($data);
            return $this->handleResponse([], 'User created successfully!');
        }
    }

    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password'  => 'required',
            'password' => 'required|min:6'
        ]);
        if($validator->fails()){
            return $this->handleError($validator->errors());
        }
        try{
            $user = Auth::User();
            if (\Hash::check($request->get('current_password'), $user->password)) {
                $user->password = \Hash::make($request->get('password'));
                $user->save();
                return $this->handleResponse([],'Password changed successfully!');
            } else {
                return $this->handleError('Current password is incorrect.');
            }
        }catch(\Exception $e){
            return $this->handleError('Something went wrong.please try again!');
        }
    }

    public function delete(Request $request)
    {
        User::where('id',$request->id)->update(['is_active'=>0]);
        Commonhelper::setCache('users');
        return $this->handleResponse([],'User removed successfully!');
    }

    public function updateProfile(Request $request)
    {
        $request->id = Auth::user()->id;
        return $this->store($request);
    }

}
