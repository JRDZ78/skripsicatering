<?php

namespace App\Http\Controllers\api;

use App\CateringService;
use App\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function catering_service()
    {
        $cater = CateringService::all();
        return response()->json($cater);
    }

    public function menu(Request $request){
        $menu = Menu::select('menu.*','catering_services.name as cater_name')
    		->join('catering_services', 'catering_services.id', 'menu.catering_service_id')
    		->where('menu.catering_service_id', $request->id)->get();
        return response()->json($menu);
    }

    public function menuDetail(Request $request){
        $menu_detail = Menu::find($request->id);
        return response()->json($menu_detail);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
