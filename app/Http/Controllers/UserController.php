<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\User;
use App\CateringService;
use App\UserRole;

use File;

use Validator;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function loginForm()
    {
        return view('login.login');
    }

    public function registerForm()
    {
        return view('login.register');
    }

    public function login(request $request)
    {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password], $request->remember)) {
            if(Auth::user()->role_id == 3){
                return redirect()->back()->with('error', 'Customer cannot login, please contact admin.');
            }
            return redirect('/homepage');
        }

        else {
            return redirect()->back()->with('error', 'username or password incorrect');
        }
    }

    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'username' => 'required',
            'userFirstname' => 'required',
            'userLastname' => 'required',
            'userEmail' => 'required|unique:users,email|email',
            'userPassword' => 'required|min:7|alpha_num|confirmed',
            'userPhone' => 'required|numeric',
            'avatar' => 'image|nullable',
            'userAddress' => 'required|min:10',

            'caterserviceName' => 'required',
            'caterserviceLogo' => 'image|nullable',
            'caterservicePhone' => 'required|numeric',
            'caterserviceAddress' => 'required|min:10'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $indexUser = new User;
        $indexCaterServ = new CateringService;

        $indexUser->username = $request->username;
        $indexUser->firstname = $request->userFirstname;
        $indexUser->lastname = $request->userLastname;
        $indexUser->email = $request->userEmail;
        $indexUser->role_id = UserRole::find(2)->id;
        $indexUser->password = bcrypt($request->userPassword);
        $indexUser->phone = $request->userPhone;
        $indexUser->avatar = $request->avatar;
        $indexUser->address = $request->userAddress;
        if ($request->hasFile('avatar')) {
            $pathSource = 'upload/user/avatar/';
            $file = $request->file('avatar');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move($pathSource, $filename);
            $indexUser->avatar = $pathSource . $filename;
        }
        $indexUser->save();

        $indexCaterServ->name = $request->caterserviceName;
        $indexCaterServ->logo = $request->caterserviceLogo;
        $indexCaterServ->phone = $request->caterservicePhone;
        $indexCaterServ->address = $request->caterserviceAddress;
        $indexCaterServ->user_id = $indexUser->id;

        if ($request->hasFile('caterserviceLogo')) {
            $pathSource = 'upload/caterservice/logo/';
            $file = $request->file('caterserviceLogo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move($pathSource, $filename);
            $indexCaterServ->logo = $pathSource . $filename;
        }

        $indexCaterServ->save();
        Auth::loginUsingId($indexUser->id);
        return redirect('/homepage');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function manageUserForm(){
        $user = User::select('users.*','user_roles.rolename')
            ->join('user_roles','user_roles.id','users.role_id')
            ->where('users.role_id','<>',1)
            ->get();


        return view('admin.manageUser', compact('user'));
    }

    public function viewProfileForm()
    {
        $user = User::find(Auth::id());
        return view('profile.viewProfile', compact('user'));
    }

    public function updateProfileForm()
    {
        $user = User::find(Auth::id());
        return view('profile.updateProfile', compact('user'));
    }

    public function changePasswordForm(){
        $user = User::find(Auth::id());
        return view('profile.changePassword', compact('user'));
    }

    public function updateProfile(Request $request)
    {
	    $validator = Validator::make($request->all(),[
	        'username' => 'required',
            'userFirstname' => 'required',
            'userLastname' => 'required',
            'userEmail' => 'required|email',
            'userPhone' => 'required|numeric',
            'avatar' => 'image|nullable',
            'userAddress' => 'required|min:10'
        ]);


	    if ($validator->fails()){
	        return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

	    $user = User::find(Auth::id());
	    $user->username = $request->username;
        $user->firstname = $request->userFirstname;
        $user->lastname = $request->userLastname;
        $user->email = $request->userEmail;
        $user->phone = $request->userPhone;
        $user->avatar = $request->avatar;
        $user->address = $request->userAddress;
        if ($request->hasFile('avatar')) {
            $pathSource = 'upload/user/avatar/';
            $file = $request->file('avatar');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move($pathSource, $filename);
            $user->avatar = $pathSource . $filename;
        }
        $user->save();
        return redirect('/viewProfileForm');
    }

    public function changePassword(Request $request){
        $validator = Validator::make($request->all(),[
            'password' => 'required|string|confirmed'
        ]);



//        return !Hash::check($request->password_old, Auth::user()->password) ? 'true' : 'false';

        $isPasswordMatch = Hash::check($request->password_old, Auth::user()->password);
        $validator->after(function($validator) use ($isPasswordMatch){
            if (!$isPasswordMatch){
                $validator->errors()->add('password_old','Incorrect old password!');
            }
        });

//        if($validator->fails()){
//            return redirect()->back()
//                ->withError($validator)
//                ->withInput();
//        }

        $user = User::find(Auth::id());
        $user->password=bcrypt($request->password);
        $user->save();
        return redirect('/viewProfileForm');
    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }


}
