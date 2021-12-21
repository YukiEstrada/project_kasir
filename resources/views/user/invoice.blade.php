@extends('user.layout1')

@section('content')

@endsection        

@section('content1')

<div class="container my-5 p-0">
    <div class="row gutters">
            <div class="col-1x-12 col-lg-12 col-md-12 col-sm-12 col-12">
                {{-- <div class="card"> --}}
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
                                            <a href="{{ route('item_invoice') }}" class="btn btn-secondary">
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
                                                <div>24 Desember 2021</div>
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
                                                        <th>Product ID</th>
                                                        <th>Quantity</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            Wordpress Template
                                                            <p class="m-0 text-muted">
                                                                
                                                            </p>
                                                        </td>
                                                        <td>#50000981</td>
                                                        <td>9</td>
                                                        <td>Rp. </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Maxwell Admin Template
                                                            <p class="m-0 text-muted">
                                                                
                                                            </p>
                                                        </td>
                                                        <td>#50000126</td>
                                                        <td>5</td>
                                                        <td>Rp. </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Unify Admin Template
                                                            <p class="m-0 text-muted">
                                                                
                                                            </p>
                                                        </td>
                                                        <td>#50000821</td>
                                                        <td>6</td>
                                                        <td>Rp. </td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td colspan="2">
                                                            <h5 class="text-success"><strong>Total</strong></h5>
                                                        </td>			
                                                        <td>
                                                            <h5 class="text-success"><strong>Rp. </strong></h5>
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