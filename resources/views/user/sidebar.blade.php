<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <form method="GET" action="" id="category-filter" class="form-inline">
            <label class="form-label"> Category </label>
            <select name="category" class="form-control" onchange="this.form.submit()">
                <option value=""> </option> 
                @php 
                    $category_arr = ['Main Dish', 'Side Dish', 'Drink', 'Dessert', 'Package'];
                @endphp
                @foreach($category_arr as $category)
                    @if(request()->category != null && request()->category == $category)
                        <option value="{{$category}}" selected> {{$category}} </option> 
                    @else
                        <option value="{{$category}}"> {{$category}} </option> 
                    @endif
                @endforeach
            </select>
          </form>
    </div>
</nav> 