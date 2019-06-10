<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use App\User;
use App\CateringService;
use App\Menu;
use App\MenuType;
use App\MenuWeekend;

class MenuController extends Controller
{
    public function addMenuForm()
    {
        return view('menu.addMenu');
    }

    public function addMenu(Request $request){
        $validator = Validator::make($request->all(), [
            'menu_name' => 'required|min:2',
            'menu_image' => 'image',
            'menu_price' =>'required|numeric',
            'weekday' => 'min:1'
        ]);

        $currentUserCatering = CateringService::where('user_id', Auth::id())->first()->id;

        $validator->after(function ($validator) use ($request, $currentUserCatering) {
            $isExist = Menu::where('catering_service_id', $currentUserCatering)
                ->where('menu_name', $request->menu_name)
                ->count();

            if ($isExist > 0) {
                $validator->errors()->add('menu_name', 'This menu already exist');
            }
        });

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $index = new Menu;
                
        $index->menu_name           = $request->menu_name;
        $index->menu_image          = $request->menu_image;
        $index->catering_service_id = $currentUserCatering;
        $index->menu_type_id        = $request->menu_type_id;
        $index->menu_price          = $request->menu_price;
        $index->weekday             = implode(", ",$request->weekday);

        if ($request->hasFile('menu_image')) {
            $pathSource = 'upload/menu/image/';
            $file       = $request->file('menu_image');
            $filename   = time() . '.' . $file->getClientOriginalExtension();
            $file->move($pathSource, $filename);
            $index->menu_image = $pathSource . $filename;
        }

        $index->save();
        
        return redirect('/homepage');
    }

    public function deleteMenu($id){
        Menu::destroy($id);
        return redirect()->back();
    }
}
