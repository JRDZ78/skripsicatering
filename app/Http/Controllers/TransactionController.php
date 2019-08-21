<?php

namespace App\Http\Controllers;

use App\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    //
    public function transactionListForm(){
        $detailWaiting = TransactionDetail::select('transactiondetails.*','transactionheaders.order_date','menu.menu_name','users.username','users.firstname','users.lastname','users.phone')
            ->join('transactionheaders','transactionheaders.id','transactiondetails.transaction_header_id')
            ->join('users','users.id','transactionheaders.user_id')
            ->join('catering_services','catering_services.id','transactiondetails.cater_id')
            ->join('menu','menu.id','transactiondetails.menu_id')
            ->where('catering_services.user_id',Auth::id())->where('status','WAITING')->get();

        $detailOngoing = TransactionDetail::select('transactiondetails.*','transactionheaders.order_date','menu.menu_name','users.username','users.firstname','users.lastname','users.phone')
            ->join('transactionheaders','transactionheaders.id','transactiondetails.transaction_header_id')
            ->join('users','users.id','transactionheaders.user_id')
            ->join('catering_services','catering_services.id','transactiondetails.cater_id')
            ->join('menu','menu.id','transactiondetails.menu_id')
            ->where('catering_services.user_id',Auth::id())->where('status','ONGOING')->get();

        $detailDecline = TransactionDetail::select('transactiondetails.*','transactionheaders.order_date','menu.menu_name','users.username','users.firstname','users.lastname','users.phone')
            ->join('transactionheaders','transactionheaders.id','transactiondetails.transaction_header_id')
            ->join('users','users.id','transactionheaders.user_id')
            ->join('catering_services','catering_services.id','transactiondetails.cater_id')
            ->join('menu','menu.id','transactiondetails.menu_id')
            ->where('catering_services.user_id',Auth::id())->where('status','DECLINED')->get();

        $detailComplain = TransactionDetail::select('transactiondetails.*','transactionheaders.order_date','menu.menu_name','users.username','users.firstname','users.lastname','users.phone')
            ->join('transactionheaders','transactionheaders.id','transactiondetails.transaction_header_id')
            ->join('users','users.id','transactionheaders.user_id')
            ->join('catering_services','catering_services.id','transactiondetails.cater_id')
            ->join('menu','menu.id','transactiondetails.menu_id')
            ->where('catering_services.user_id',Auth::id())->where('status','COMPLAIN')->get();

        $detailCompleted = TransactionDetail::select('transactiondetails.*','transactionheaders.order_date','menu.menu_name','users.username','users.firstname','users.lastname','users.phone')
            ->join('transactionheaders','transactionheaders.id','transactiondetails.transaction_header_id')
            ->join('users','users.id','transactionheaders.user_id')
            ->join('catering_services','catering_services.id','transactiondetails.cater_id')
            ->join('menu','menu.id','transactiondetails.menu_id')
            ->where('catering_services.user_id',Auth::id())->where('status','COMPLETED')->get();

        return view('transaction.transactionList',compact('detailComplain','detailCompleted','detailDecline','detailOngoing','detailWaiting'));
    }

    public function reject($id){
        $index = TransactionDetail::find($id);
        $index->status = 'DECLINED';
        $index->save();
        return redirect()->back();
    }
}
