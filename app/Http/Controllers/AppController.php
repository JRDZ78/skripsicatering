<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;

use App\Menu;
use App\MenuType;
use App\MenuWeekend;

class AppController extends Controller
{
	public function homePage(Request $request){
    	$menu = Menu::select('menu.*')
    		->join('catering_services', 'catering_services.id', 'menu.catering_service_id')
    		->where('catering_services.user_id', Auth::id())
    		->where('menu_name', 'LIKE', '%'.$request->search.'%');

    	if($request->menu_type){
    		$menu_header->where('menu_type_id',$request->menu_type);
    	}

    	$menu = $menu->get();

    	return view('home.homepage',compact('menu'));
    }
}
