<?php

namespace App\Http\Controllers\Api;

use App\Cart;
use App\TransactionDetail;
use App\TransactionHeader;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class TransactionApiController extends Controller
{

    public function checkOut(Request $request)
    {
        //$cart = Cart::where('user_id', Auth::id())->select('menu_id','cater_id')->get();

        $header = new TransactionHeader;
//        $detail = new TransactionDetail;

        $header->user_id = $request->user_id;
        $header->order_date = date('Y-m-d H:i:s');
        $header->save();

        $data = [];
        //foreach between StartDate to EndDate
        $numDays = $request->dateValue;
        //$getWeekDay = implode(", ", $request->getWeekDay);
        $begin = new DateTime($request->deliver_date);
        $end = new DateTime(Carbon::parse($request->deliver_date)->addDays($numDays));


        $daterange = new DatePeriod($begin, new DateInterval('P1D'), $end);
        foreach ($daterange as $date) {
            $thisWeekday = $date->format('w');
            foreach ($request->carts as $list) {
                $listWeekday = explode(', ', $list['weekdaySelected']);
                if (in_array($thisWeekday, $listWeekday)) {
                    $data[] = [
                        'transaction_header_id' => $header->id,
                        'menu_id' => $list['menu_id'],
                        'cater_id' => $list['cater_id'],
                        'price' => $list['menu_price'],
                        'quantity' => $list['quantity'],
                        'deliver_date' => $date->format('Y-m-d'),
                        'deliver_location' => $request->deliver_location,
                        'status' => 'WAITING'
                    ];
                }
            }
        }


        DB::table('transactiondetails')->insert($data);
        Cart::where('user_id',$request->user_id)->delete();

        return response()->json([
            'message' => 'Check Out Successful!'
        ], 201);


    }

    public function getOrders(){
        $detail = TransactionDetail::select('transactiondetails.*','menu.menu_name','menu.menu_image','catering_services.name as cater_name','transactionheaders.user_id','transactionheaders.order_date')
            ->join('transactionheaders','transactionheaders.id','transactiondetails.transaction_header_id')
            ->join('users','users.id','transactionheaders.user_id')
            ->join('catering_services','catering_services.id','transactiondetails.cater_id')
            ->join('menu','menu.id','transactiondetails.menu_id')
            ->where('transactionheaders.user_id',Auth::id())->get();
        $result = [
            'items' => $detail,
        ];
        return response()->json($result);
    }


    public function index()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
