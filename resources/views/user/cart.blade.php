@extends('user.layout1')

@section('content')

@endsection        

@section('content1')
    @if(isset($carts))
        <form method="POST" action="{{route('cart_checkout')}}">
            @csrf
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" style="width:100px">Quantity</th>
                        <th scope="col">Item</th>
                        <th scope="col">Price (Rp) </th>
                        <th scope="col">Subtotal (Rp)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($carts as $cart)
                        <tr>
                            <td><input type="number" class="form-control" name="quantity" value="{{$cart->quantity}}" min=1 style="width:100px"></td>
                            <td>{{ $cart->item->name }}</td>
                            <td class="price-col">{{ $cart->item->price }}</td>
                            <td class="subtotal-col">{{ $cart->quantity * $cart->item->price }}</td>
                        </tr>
                    @endforeach 
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3"> TOTAL </td>
                        <td class="total-col"> {{$total_price}}</td>
                    </tr>
                </tfoot>
            </table>

            <hr>
            <div class="row">
                <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                    <input type="checkbox" name="takeaway" value="true"> Takeaway <br>
                    <div class="form-group form-inline mt-2">
                        <label class="form-label mr-2"> Paid Price </label>
                        <input type="number" class="form-control" name="paid_price" step="500"> 
                    </div> 
                    <button type="submit" class="btn btn-successname="button">Checkout</button>
                </a>
                </div>
            </div>
        </form>
    @else
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <h1>No Items Addded!</h1>
            </div>
        </div>
    @endif

<br>
<a href="/user/category">Back to Menu</a>

<script>
    $('input[name="quantity"]').on('change', function($this){
        var quantity = $(this).val();
        var price = $(this).closest('tr').find('.price-col').text();
        var subtotal = quantity * price;

        $(this).closest('tr').find('.subtotal-col').text(subtotal);

        //var table = $(this).closest('table').find('tbody');
    });
</script>
@endsection