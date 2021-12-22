@extends('user.layout1')

@section('content')

@endsection        

@section('content1')
    @if (Session::has('cart'))
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <ul class="list-group">
                    @foreach((array)$items as $p)
                        <li class="list-group-item">
                            <span class="badge">{{ $p['quantity'] }}</span>
                            <strong>{{ $p['item'] }}</strong>
                            <span class="label label-success">{{ $p['price'] }}</span> 
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <strong>Total : {{ $totalPrice }}</strong>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <a href="{{ route('item_invoice') }}">
                <button type="button" class="btn btn-successname="button">Checkout</button>
            </a>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <h1>No Items Addded!</h1>
            </div>
        </div>
        
    @endif

<br>
<a href="/user/category">Back to Menu</a>
@endsection