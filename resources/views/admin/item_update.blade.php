@extends('admin.layout')

@section('content')
    
    <h1 style= "text-align:center;margin-top:70px;margin-bottom:20px"> Update Item Form <i class="fas fa-edit"></i> </h1>

                
    <form action="{{route('admin_item_update_post', $items->id)}}" method="POST" enctype="multipart/form-data">
                    
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" name="name" value="{{ $items->name }}" class="form-control" placeholder="Enter menu name">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1"value="{{ $items->category }}" class="form-label">Menu Category</label> <br>
            <select class="form-select" aria-label="Select Menu's category" name="category" required>
            <option selected="">Select menu's category</option>
                @php 
                    $category_array = ["Main Dish", "Side Dish", "Drink", "Dessert", "Package"];
                @endphp
                @foreach($category_array as $category)
                    @if($items->category == $category)
                        <option value="{{$category}}" selected> {{$category}} </option>
                    @else
                        <option value="{{$category}}"> {{$category}} </option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Price</label>
            <input type="number" name="price" value="{{ $items->price }}" class="form-control" placeholder="Enter menu price(IDR)">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Picture</label>
            <input type="file" name="image" value="{{ $items->image_path }}"class="form-control" placeholder="Select menu picture">
        </div>
        @if($items->image_path != null)
            <img src="{{ url($items->image_path) }}" width="100px" style= "margin-bottom:30px;">
        @endif 
        
        <br>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{route('admin_data_menu')}}" class="btn btn-light btn-outline-dark"> Cancel </a>
    </form>
@endsection