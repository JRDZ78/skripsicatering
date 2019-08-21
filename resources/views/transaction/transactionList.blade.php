@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Order Lists</h2>
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#waiting">Waiting</a></li>
            <li><a data-toggle="tab" href="#schedule">Schedule</a></li>
            <li><a data-toggle="tab" href="#rejects">Rejects</a></li>
            <li><a data-toggle="tab" href="#complaints">Complaints</a></li>
            <li><a data-toggle="tab" href="#completed">Completed</a></li>
        </ul>

        <div class="tab-content">
            <div id="waiting" class="tab-pane fade in active">
                <h3>Orders Waiting</h3>
                <p>List of pending orders, waiting for your approval.</p>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Username</th>
                        <th>Fullname</th>
                        <th>Phone Number</th>
                        <th>Order Date</th>
                        <th>Menu Name</th>
                        <th>Quantity</th>
                        <th>Deliver Date</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($detailWaiting as $detail_list)
                    <tr>
                        <td>{{$detail_list->username}}</td>
                        <td>{{$detail_list->firstname}} {{$detail_list->lastname}}</td>
                        <td>{{$detail_list->phone}}</td>
                        <td>{{$detail_list->order_date}}</td>
                        <td>{{$detail_list->menu_name}}</td>
                        <td>{{$detail_list->quantity}}</td>
                        <td>{{$detail_list->deliver_date}}</td>
                        <td>{{$detail_list->deliver_location}}</td>
                        <td>{{$detail_list->status}}</td>
                        <td>
                            <a class="btn btn-danger" href="/reject/{{$detail_list->id}}"
                               onclick="return confirm('Do you want to reject this order?')">Reject</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div id="schedule" class="tab-pane fade">
                <h3>Delivery Schedule</h3>
                <p>List orders that has been accepted by you and ongoing a catering service.</p>
                <h3>Orders Waiting</h3>
                <p>List of pending orders, waiting for your approval.</p>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Username</th>
                        <th>Fullname</th>
                        <th>Phone Number</th>
                        <th>Order Date</th>
                        <th>Menu Name</th>
                        <th>Quantity</th>
                        <th>Deliver Date</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($detailOngoing as $detail_list)
                    <tr>
                        <td>{{$detail_list->username}}</td>
                        <td>{{$detail_list->firstname}} {{$detail_list->lastname}}</td>
                        <td>{{$detail_list->phone}}</td>
                        <td>{{$detail_list->order_date}}</td>
                        <td>{{$detail_list->menu_name}}</td>
                        <td>{{$detail_list->quantity}}</td>
                        <td>{{$detail_list->deliver_date}}</td>
                        <td>{{$detail_list->deliver_location}}</td>
                        <td>{{$detail_list->status}}</td>
                        <td>
                            <a class="btn btn-danger" href="/reject/{{$detail_list->id}}"
                               onclick="return confirm('Do you want to reject this order?')">Reject</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div id="rejects" class="tab-pane fade">
                <h3>Rejected / Cancelled Orders</h3>
                <p>List of orders that has been rejected by you, or cancelled by customer.</p>
                <h3>Orders Waiting</h3>
                <p>List of pending orders, waiting for your approval.</p>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Username</th>
                        <th>Fullname</th>
                        <th>Phone Number</th>
                        <th>Order Date</th>
                        <th>Menu Name</th>
                        <th>Quantity</th>
                        <th>Deliver Date</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($detailDecline as $detail_list)
                    <tr>
                        <td>{{$detail_list->username}}</td>
                        <td>{{$detail_list->firstname}} {{$detail_list->lastname}}</td>
                        <td>{{$detail_list->phone}}</td>
                        <td>{{$detail_list->order_date}}</td>
                        <td>{{$detail_list->menu_name}}</td>
                        <td>{{$detail_list->quantity}}</td>
                        <td>{{$detail_list->deliver_date}}</td>
                        <td>{{$detail_list->deliver_location}}</td>
                        <td>{{$detail_list->status}}</td>
                        <td>
                            <a class="btn btn-danger" href="/reject/{{$detail_list->id}}"
                               onclick="return confirm('Do you want to reject this order?')">Reject</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div id="complaints" class="tab-pane fade">
                <h3>Complaints</h3>
                <p>List of orders that has complaints about your orders.</p>
                <h3>Orders Waiting</h3>
                <p>List of pending orders, waiting for your approval.</p>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Username</th>
                        <th>Fullname</th>
                        <th>Phone Number</th>
                        <th>Order Date</th>
                        <th>Menu Name</th>
                        <th>Quantity</th>
                        <th>Deliver Date</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($detailComplain as $detail_list)
                    <tr>
                        <td>{{$detail_list->username}}</td>
                        <td>{{$detail_list->firstname}} {{$detail_list->lastname}}</td>
                        <td>{{$detail_list->phone}}</td>
                        <td>{{$detail_list->order_date}}</td>
                        <td>{{$detail_list->menu_name}}</td>
                        <td>{{$detail_list->quantity}}</td>
                        <td>{{$detail_list->deliver_date}}</td>
                        <td>{{$detail_list->deliver_location}}</td>
                        <td>{{$detail_list->status}}</td>
                        <td>
                            <a class="btn btn-danger" href="/reject/{{$detail_list->id}}"
                               onclick="return confirm('Do you want to reject this order?')">Reject</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div id="completed" class="tab-pane fade">
                <h3>Completed Orders</h3>
                <p>Lists of orders that has been completed and received full profit from your services.</p>
                <h3>Orders Waiting</h3>
                <p>List of pending orders, waiting for your approval.</p>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Username</th>
                        <th>Fullname</th>
                        <th>Phone Number</th>
                        <th>Order Date</th>
                        <th>Menu Name</th>
                        <th>Quantity</th>
                        <th>Deliver Date</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($detailCompleted as $detail_list)
                    <tr>
                        <td>{{$detail_list->username}}</td>
                        <td>{{$detail_list->firstname}} {{$detail_list->lastname}}</td>
                        <td>{{$detail_list->phone}}</td>
                        <td>{{$detail_list->order_date}}</td>
                        <td>{{$detail_list->menu_name}}</td>
                        <td>{{$detail_list->quantity}}</td>
                        <td>{{$detail_list->deliver_date}}</td>
                        <td>{{$detail_list->deliver_location}}</td>
                        <td>{{$detail_list->status}}</td>
                        <td>
                            <a class="btn btn-danger" href="/reject/{{$detail_list->id}}"
                               onclick="return confirm('Do you want to reject this order?')">Reject</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
