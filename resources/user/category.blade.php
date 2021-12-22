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
      <table class="table table-image">
        <thead>
          <tr>
            <th scope="col">No. </th>
            <th scope="col">Menu</th>
            <th scope="col">Menu Name</th>
            <th scope="col">Category</th>
            <th scope="col">Price</th>
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
                    
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>   
    </div>
</div>

@endsection