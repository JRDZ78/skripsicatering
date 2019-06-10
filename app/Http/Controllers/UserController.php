<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\User;
use App\CateringService;
use App\UserRole;

use File;

use Validator;

use Hash;

class UserController extends Controller
{
	public function loginForm(){
		return view('login.login');
	}

	public function registerForm(){
		return view('login.register');
	}

	public function login(request $request){
		if (Auth::attempt(['username' => $request->username, 'password' => $request->password], $request->remember)) {
	        return redirect('/homepage');
	    }
	    else{
	    	return redirect()->back()->with('error','username or password incorrect');
	    }
	}

	public function register(Request $request){
		
		$validator = Validator::make($request->all(),[

	        'username' => 'required',
	        'userFirstname' => 'required',
	        'userLastname' => 'required',
	        'userEmail' => 'required|unique:users,email|email',
	        'userPassword' =>'required|min:7|alpha_num|confirmed',
	        'userPhone' => 'required|numeric',
	        'userAddress' => 'required|min:10',

	        'caterserviceName'=>'required',
	        'caterserviceLogo'=>'image|nullable',
	        'caterservicePhone'=>'required|numeric',
	        'caterserviceAddress'=>'required|min:10'
	    ]);

	    if($validator->fails())
		{
			return redirect()->back()->withErrors($validator)->withInput();
		}

		$indexUser = new User;
		$indexCaterServ = new CateringService;

		$indexUser->username=$request->username;
		$indexUser->firstname=$request->userFirstname;
		$indexUser->lastname=$request->userLastname;
		$indexUser->email=$request->userEmail;
		$indexUser->role_id=UserRole::find(2)->id;
		$indexUser->password=bcrypt($request->userPassword);
		$indexUser->phone=$request->userPhone;
		$indexUser->address=$request->userAddress;
		$indexUser->save();

		$indexCaterServ->name=$request->caterserviceName;
		$indexCaterServ->logo=$request->caterserviceLogo;
		$indexCaterServ->phone=$request->caterservicePhone;
		$indexCaterServ->address=$request->caterserviceAddress;
		$indexCaterServ->user_id=$indexUser->id;

		if ($request->hasFile('caterserviceLogo')) {
            $pathSource = 'upload/caterservice/logo/';
            $file       = $request->file('caterserviceLogo');
            $filename   = time() . '.' . $file->getClientOriginalExtension();
            $file->move($pathSource, $filename);
            $indexCaterServ->logo = $pathSource . $filename;
        }

        $indexCaterServ->save();
        Auth::loginUsingId($indexUser->id);
        return redirect('/homepage');
	}

	public function logout(){
		Auth::logout();
		return redirect('/');
	}

	public function user(Request $request)
    {
        return response()->json($request->user());
    }


	// public function profileForm(){
	// 	$user = User::find(Auth::id());
	// 	return view('login.profile',compact('user'));
	// }

	// public function updateForm(){
	// 	$user = User::find(Auth::id());
	// 	return view('login.update',compact('user'));
	// }

	// public function update(Request $request){

	//     $validator = Validator::make($request->all(), [
	//         'name' => 'required|min:5|max:25',
	//         'email' => 'required|unique:users,email,'.Auth::id().'|email',
	//         'password' =>'required|min:5|alpha_num|confirmed',
	//         'phone' => 'required|numeric',
	//         'gender' => 'required',
	//         'address' => 'required|min:10',
	//         'photo' => 'image'
	//     ]);

	//     $validator->after(function ($validator) use ($request) {
 //            if (!Hash::check($request->password_old, Auth::user()->password)) {
 //                $validator->errors()->add('password_old', 'Your old password invalid');
 //            }
 //        });

 //        if ($validator->fails()) {
 //            return redirect()->back()
 //                ->withErrors($validator)
 //                ->withInput();
 //        }

	// 	$user = User::find(Auth::id());
	// 	$user->name=$request->name;
	// 	$user->email=$request->email;
	// 	$user->password=bcrypt($request->password);
	// 	$user->phone=$request->phone;
	// 	$user->gender=$request->gender;
	// 	$user->address=$request->address;
	// 	if ($request->hasFile('photo')) {
 //            $pathSource = 'upload/user/photo/';
 //            $file       = $request->file('photo');
 //            $filename   = time() . '.' . $file->getClientOriginalExtension();
 //            $file->move($pathSource, $filename);
 //            $user->photo = $pathSource . $filename;
 //        }
 //        $user->save();
 //        return redirect('/profileForm');

	// }

	// public function login(Request $request){
	//     if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
	//         return redirect('/');
	//     }
	//     else{
	//     	return redirect()->back()->with('error','email or password incorrect');
	//     }

	// }
	// public function logout(){
	// 	Auth::logout();
	// 	return redirect('/');
	// }

	// // Manage User Section
	// public function manageUser(Request $request){

	// 	if ($request->user()->can('admin')) {
	// 	    $user=User::where('name', 'LIKE', '%'.$request->search.'%')->get();
 //    		return view('manageUser.userView', compact('user'));
	// 	}

 //    	return redirect('/');
 //    }

 //    public function addUserForm(Request $request){
 //    	if ($request->user()->can('admin')) {
 //    		return view('manageUser.userAdd');
 //    	}
 //    	return redirect('/');
 //    }

 //    public function updateUserForm(Request $request, $id){
 //    	if ($request->user()->can('admin')) {
	//     	$user=User::find($id);
	//     	return view('manageUser.userUpdate',compact('user'));
	//     }
 //    	return redirect('/');
 //    }

 //    public function addUser(Request $request){
 //    	$this->validate($request, [
	//         'name' => 'required|min:5|max:25',
	//         'email' => 'required|unique:users|email',
	//         'password' =>'required|min:5|alpha_num|confirmed',
	//         'phone' => 'required|numeric',
	//         'gender' => 'required',
	//         'address' => 'required|min:10',
	//         'photo' => 'image'

	//     ]);

	// 	$index=new User;
	// 	$index->name=$request->name;
	// 	$index->email=$request->email;
	// 	$index->password=bcrypt($request->password);
	// 	$index->phone=$request->phone;
	// 	$index->gender=$request->gender;
	// 	$index->address=$request->address;

	// 	if ($request->hasFile('photo')) {
 //            $pathSource = 'upload/user/photo/';
 //            $file       = $request->file('photo');
 //            $filename   = time() . '.' . $file->getClientOriginalExtension();
 //            $file->move($pathSource, $filename);
 //            $index->photo = $pathSource . $filename;
 //        }

 //        $index->save();
 //        return redirect('/manageUser');
 //    }

 //    public function updateUser(Request $request){
 //    	$validator = Validator::make($request->all(), [
	//         'name' => 'required|min:5|max:25',
	//         'email' => 'required|unique:users,email,'.Auth::id().'|email',
	//         'password' =>'required|min:5|alpha_num|confirmed',
	//         'phone' => 'required|numeric',
	//         'gender' => 'required',
	//         'address' => 'required|min:10',
	//         'photo' => 'image'
	//     ]);

	//     $validator->after(function ($validator) use ($request) {
 //            if (!Hash::check($request->password_old, Auth::user()->password)) {
 //                $validator->errors()->add('password_old', 'Your old password invalid');
 //            }
 //        });

 //        if ($validator->fails()) {
 //            return redirect()->back()
 //                ->withErrors($validator)
 //                ->withInput();
 //        }

	// 	$user = User::find($request->id);
	// 	$user->name=$request->name;
	// 	$user->email=$request->email;
	// 	$user->password=bcrypt($request->password);
	// 	$user->phone=$request->phone;
	// 	$user->gender=$request->gender;
	// 	$user->address=$request->address;
	// 	if ($request->hasFile('photo')) {
 //            $pathSource = 'upload/user/photo/';
 //            $file       = $request->file('photo');
 //            $filename   = time() . '.' . $file->getClientOriginalExtension();
 //            $file->move($pathSource, $filename);
 //            $user->photo = $pathSource . $filename;
 //        }
 //        $user->save();
 //        return redirect('/manageUser');
 //    }

 //    public function deleteUser($id){
 //        $user=User::destroy($id);
 //        return redirect()->back();
 //    }


}