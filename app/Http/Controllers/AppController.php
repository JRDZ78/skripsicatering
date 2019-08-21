<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;

use App\Menu;
use App\MenuType;

class AppController extends Controller
{
	public function homePage(Request $request){

	    $menu = Menu::select('menu.*','catering_services.name as cater_name')
    		->join('catering_services', 'catering_services.id', 'menu.catering_service_id');
    		//->where('menu_name', 'LIKE', '%'.$request->search.'%');

	    if(!Auth::user()->isAdmin()){
	        $menu->where('catering_services.user_id', Auth::id());
        }

    	if($request->menu_type){
    		$menu->where('menu_type_id',$request->menu_type);
    	}


    	$menu = $menu->get();

    	return view('home.homepage',compact('menu'));
    }
}
