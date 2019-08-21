<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\User;
use App\CateringService;

use File;

use Validator;

use Hash;

class CaterController extends Controller
{
    public function manageCaterForm(){
        $cater = CateringService::select('catering_services.*','users.firstname','users.lastname')
            ->join('users','users.id','catering_services.user_id')
            ->get();
        return view('admin.manageCater',compact('cater'));
    }

    public function viewCaterProfileForm(){
        $cater = CateringService::where('user_id',Auth::id())->first();
        return view('profile.viewCaterProfile',compact('cater'));
    }

    public function updateCaterProfileForm(){
        $cater = CateringService::where('user_id',Auth::id())->first();
        return view('profile.updateCaterProfile',compact('cater'));
    }

    public function updateCaterProfile(Request $request){
        $validator = Validator::make($request->all(),[
           'caterserviceName' => 'required',
           'caterserviceDescription' => 'nullable',
           'caterservicePhone' => 'required|numeric',
           'caterserviceAddress' => 'required|min:10',
           'caterserviceBanner' => 'image'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $cater = CateringService::where('user_id',Auth::id())->first();
        $cater->name = $request->caterserviceName;
        $cater->description = $request->caterserviceDescription;
        $cater->phone = $request->caterservicePhone;
        $cater->address = $request->caterserviceAddress;
        $cater->banner = $request->caterserviceBanner;

        if ($request->hasFile('caterserviceBanner')) {
            $pathSource = 'upload/caterservice/logo/';
            $file = $request->file('caterserviceBanner');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move($pathSource, $filename);
            $cater->banner = $pathSource . $filename;
        }

        $cater->save();
        return redirect('/viewCaterProfileForm');
    }
}
