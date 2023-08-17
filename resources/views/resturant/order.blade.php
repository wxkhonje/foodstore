@extends('layouts.backend')
@section('content')
        <div class="container px-12">
        <!-- Blog Section Begin -->

            <section class="from-blog spad">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title from-blog__title">
                                <h1>MENU</h1>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">MENU</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>Order Number</th>
                                            <th>Order Status</th>
                                            <th>Delivery Address</th>
                                            <th>Contact Number</th>
                                            <th>Prepare Order</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>Order Number</th>
                                            <th>Order Status</th>
                                            <th>Delivery Address</th>
                                            <th>Contact Number</th>
                                            <th>Prepare Order</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach($Orders as $order)
                                                <tr>
                                                <td>{{$order->order_number}}</td>
                                                <td>{{$order->status}}</td>
                                                <td>{{$order->delivery_address}}</td>
                                                <td>{{$order->contact_phone}}</td>
                                                <td><a href="{{ route('orders.edit', $order->id) }}">Prepare Order</a></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>      
        </div>
@endsection


