<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Police;
use App\Models\User;
use Hash;
use Validator;
use Auth;

class LoginController extends Controller
{
    public function policeDashboard()
    {
        $police = Police::all();
        $success = $police;

        return response()->json($success, 200);
    }

    public function userDashboard()
    {
        $user = User::all();
        $success = $user;

        return response()->json($success, 200);
    }

    public function policeLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()->all()]);
        }

        if(auth()->guard('police')->attempt(['email' => request('email'), 'password' => request('password')])){

            config(['auth.guards.api.provider' => 'police']);
            
            $police = Police::where('email', $request->email)->first();
            $success =  $police;
            $success['success'] = true;
            $success['token'] =  $police->createToken('MyApp',['police'])->accessToken; 

            return response()->json($success, 200);
        }else{ 
            return response()->json(['error' => ['Email and Password are Wrong.']], 200);
        }
    }

    public function policeRegister(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()->all()]);
        }

        $police = Police::create([
            'policename' => $request->name,
            'dob' => $request->policecode, 
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        if($police->save()){
            $success['success'] = true;
            return response()->json($success, 200);
        }else{
            $success['success'] = false;
            $success['message'] = "gagal";
            return response()->json($success, 200);
        }
    }

    public function userRegister(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()->all()]);
        }

        $police = User::create([
            'username' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        if($police->save()){
            $success['success'] = true;
            return response()->json($success, 200);
        }else{
            $success['success'] = false;
            $success['message'] = "gagal";
            return response()->json($success, 200);
        }
    }

    public function userLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()->all()]);
        }

        if(auth()->guard('user')->attempt(['email' => request('email'), 'password' => request('password')])){

            config(['auth.guards.api.provider' => 'user']);
            
            $user = User::where('email', $request->email)->first();
            $success =  $user;
            $success['success'] = true;
            $success['token'] =  $user->createToken('MyApp',['user'])->accessToken; 

            return response()->json($success, 200);
        }else{ 
            return response()->json(['error' => ['Email and Password are Wrong.']], 200);
        }
    }
    public function userlogout(Request $request){
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
    public function policelogout(Request $request){
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
}
