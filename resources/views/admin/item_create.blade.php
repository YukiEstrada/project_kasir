@extends('admin.layout')

@section('content')

    <h1 style= "text-align:center;margin-top:70px;margin-bottom:20px"> Create Item Form <i class="fas fa-plus"></i> </h1>

    <form action="{{route('admin_item_create_post')}}" method="POST" enctype="multipart/form-data">
                
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter menu name">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1" class="form-label">Menu Category</label> <br>
            <select class="form-select" aria-label="Select Menu's category" name="category" required>
                <option selected>Select menu's category</option>
                <option value="Main Dish">Main Dish</option>
                <option value="Side Dish">Side Dish</option>
                <option value="Drink">Drink</option>
                <option value="Dessert">Dessert</option>
                <option value="Package">Package</option>
            </select>
        </div>
            <div class="form-group">
            <label for="exampleInputPassword1">Price</label>
            <input type="number" name="price" class="form-control" placeholder="Enter menu price(IDR)">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Picture</label>
            <input type="file" name="image" class="form-control" placeholder="Select menu picture">
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{route('admin_data_menu')}}" class="btn btn-light btn-outline-dark"> Cancel </a>
    </form> 
@endsection