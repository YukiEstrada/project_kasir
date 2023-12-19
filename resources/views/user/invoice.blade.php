@extends('user.layout1')

@section('content')

@endsection        

@section('content1')

<div class="container my-5 p-0">
    <div class="row gutters">
            <div class="col-1x-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body p-10">
                        <div class="invoice-container">
                            <div class="invoice-header">
                                <!-- Row start -->
                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <div class="custom-actions-btns mb-5">  
                                            <a href="/user/cart" class="btn btn-primary">
                                                <i class="icon-download"></i> Back to Cart
                                            </a>
                                            <a href="{{ route('item_invoice') }}" onclick="window.print()" class="btn btn-secondary">
                                                <i class="icon-printer"></i> Print
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Row end -->
                                <!-- Row start -->
                                <div class="row gutters">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                        <a href="index.html" class="invoice-logo">
                                            CASHIERISTIC
                                        </a>
                                    </div>
                                </div>
                                <!-- Row end -->
                                <!-- Row start -->
                            
                                <div class="row gutters">
                                    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                                        <div class="invoice-details">
                                            <address>
                                                INVOICE<br>
                                                Jl Yos Sudarso No 26
                                            </address>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                                        <div class="invoice-details">
                                            <div class="invoice-num">
                                                <div>Invoice - #009</div>
                                                <div>{{ $inv->ref_no }}</div>
                                            </div>
                                        </div>													
                                    </div>
                                </div>
                                <!-- Row end -->
                            </div>
                            <div class="invoice-body">
                                <!-- Row start -->
                                <div class="row gutters">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="table-responsive">
                                            
                                            <table class="table custom-table m-0">
                                                <thead>
                                                    <tr>
                                                        <th>Product</th>
                                                        <th>Quantity</th>
                                                        <th>Price</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($inv->items as $purchased_item)
                                                    <tr>
                                                        <td>
                                                            {{ $purchased_item->name }}
                                                            <p class="m-0 text-muted"></p>
                                                        </td>
                                                        <td>{{ $purchased_item->pivot->quantity }}</td>
                                                        <td>{{ $purchased_item->pivot->price }}</td>
                                                        <td>Rp. {{ $purchased_item->pivot->price * $purchased_item->pivot->quantity }}</td>
                                                    </tr>
                                                    <tr>
                                                @endforeach
                                                        <td>&nbsp;</td>
                                                        <td colspan="2">
                                                            <h5 class="text-success"><strong>Total</strong></h5>
                                                        </td>			
                                                        <td>
                                                            <h5 class="text-success"><strong>Rp. {{ $inv->sub_total }}</strong></h5>
                                                        </td>
                                                    </tr>
                                                        <td>&nbsp;</td>
                                                        <td colspan="2">
                                                            <h5 class="text-success"><strong>Pay</strong></h5>
                                                        </td>			
                                                        <td>
                                                            <h5 class="text-success"><strong>Rp. {{ $inv->paid_price }}</strong></h5>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td colspan="2">
                                                            <h5 class="text-success"><strong>Change</strong></h5>
                                                        </td>			
                                                        <td>
                                                            <h5 class="text-success"><strong>Rp. {{ $inv->total_change }}</strong></h5>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Row end -->
                            </div>
                            <div class="invoice-footer">
                                Thank you for your Shopping.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection