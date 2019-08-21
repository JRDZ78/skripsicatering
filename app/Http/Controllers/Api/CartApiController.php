<?php

namespace App\Http\Controllers\api;

use Validator;
use App\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use DB;

class CartApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCart(Request $request)
    {

        $isExistUser = Cart::where('user_id',$request->user_id)->count();
        $isExistCater = Cart::where('cater_id',$request->cater_id)->count();
        $isExistMenu = Cart::where('menu_id',$request->menu_id)->count();

        if ($isExistMenu > 0 && $isExistCater > 0 && $isExistUser > 0){
            return response()->json(['message' => 'This Product Already On Cart'],201);
        }

        $cart = new Cart;
        $cart->user_id = $request->user_id;
        $cart->menu_id = $request->menu_id;
        $cart->cater_id = $request->cater_id;
        $cart->quantity = 1;
        $cart->save();
        return response()->json([
            'message' => 'Added To Cart!'
        ], 201);
    }


    public function getCart(){
        $cart = Cart::select('carts.*','catering_services.name as cater_name',DB::raw('"" as weekdaySelected'),'menu.menu_name','menu.menu_price','menu.weekday')
            ->join('users','users.id','carts.user_id')
            ->join('catering_services','catering_services.id','carts.cater_id')
            ->join('menu','menu.id','carts.menu_id')
            ->where('carts.user_id',Auth::id())->get();
        $result = [
            'items' => $cart,
        ];
        return response()->json($result);
    }

    public function deleteCart(Request $request){
        $id = Cart::destroy($request->id);
        return response()->json($id);
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
