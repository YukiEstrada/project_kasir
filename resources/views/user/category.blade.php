@extends('user.layout1')

@section('content')

@include('user.sidebar')

@endsection        

@section('content1')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">ALL MENU</h1>
</div>
<div class="row">
    <div class="col-12">

      <p>Search Menu</p>
      <form action="" method="GET">
        <input type="text" name="search" placeholder="Enter Menu Name" value="{{ old('search') }}">
        <input type="submit" value="SEARCH">
      </form>
        
      <br/>
      <table class="table table-image table table-bordered hovertable">
        <thead class="thead-dark">
          <tr>
            <th scope="col">No. </th>
            <th scope="col">Menu</th>
            <th scope="col">Menu Name</th>
            <th scope="col">Category</th>
            <th scope="col">Price</th>
            <th scope="col" style="width:150px">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach($items as $p)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                
                <td class="w-25">
                    <form method= "POST" action="{{ route('item_addToCart', ['id'=>$p->id])  }}">
                      @csrf
                        <button type="submit" name="item_id">
                            <img src="{{ url($p->image_path) }}" alt="Image">
                        </button>
                    </form>
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->category }}</td>
                    <td>Rp. {{ $p->price }}</td>
                    <td>
                      <form method="POST" action="{{route("item_addToCart")}}"">
                        @csrf
                        <input type="hidden" name="item_id" value="{{$p->id}}">
                        <input type="number" name="quantity" min="0" class="form-control" value="0">
                        <button type="submit" class="btn btn-success w-100 mt-2"> Add to Cart </button>
                      </form>
                    </td>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>   
    </div>
</div>
<a href="#top">Back to top of page</a>
@endsection