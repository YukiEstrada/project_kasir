@extends('admin.layout')

@section('content')
<h1 style= "text-align:center;margin-top:70px;margin-bottom:45px"> Sales Recapitulation <i class="fas fa-chart-bar"></i> </h1>

    <div style="padding:0px 30px">
    <form action="{{route('admin_home')}}" method="GET">
        <div class="form-group row">
            <label for="startDate" class="col-sm-2 col-form-label">Start Date</label>
            <div class="col-sm-10">
            <input type="date" class="form-control" id="startDate" value="{{request()->start_date}}" name="start_date">
            </div>
        </div>
        <div class="form-group row">
            <label for="endDate" class="col-sm-2 col-form-label">End Date</label>
            <div class="col-sm-10">
            <input type="date" class="form-control" id="endDate" value="{{request()->end_date}}" name="end_date">
            </div>
        </div>
        <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
        </form>
    
    </div>
    
    
    {{$orders->links()}}
    <br/>
    <br/>
    <table class="table table-bordered hovertable">
        <thead class="thead-dark">
        <tr>
            <th style="text-align:center">Date and Time</th>
            <th style="text-align:center">Ref.no</th> 
            <th style="text-align:center">Price per menu(IDR)</th>
            <th style="text-align:center">Subtotal(IDR)</th>
            <th style="text-align:center">Paid Total(IDR)</th>
            <th style="text-align:center">Change(IDR)</th>
            <th style="text-align:center">Dine In/Take Out</th>
        </tr>
            @foreach($orders as $order)
        <tr>
            <td style="vertical-align:center">{{ $order->created_at }}</td>
            <td style="vertical-align:center">{{ $order->ref_no }}</td> 
            <td style="vertical-align:center">
                @foreach($order->items as $purchased_item) 
                    {{$purchased_item->name}} :  
                    {{ $purchased_item->pivot->price  * $purchased_item->pivot->quantity}} 
                    ({{$purchased_item->pivot->quantity}})
                    <br>
                @endforeach
            </td>

            <td style="vertical-align:center">{{ $order->sub_total}} </td>
            <td style="vertical-align:center">{{ $order->paid_price}}</td>
            <td style="vertical-align:center">{{ $order->total_change}}</td>

            @if ($order->type == 0) 
                <td style="vertical-align:center">Dine in</td>
            @else 
                <td style="vertical-align:center">Take Away</td>
            @endif

        </tr>
        @endforeach
    </table>
    
    <a href="#top">Back to top of page</a>
@endsection
