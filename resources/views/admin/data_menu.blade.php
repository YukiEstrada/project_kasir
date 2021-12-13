@extends('admin.layout')

@section('content')
<h1 style= "text-align:center;margin-top:80px"> Data Menu <i class="fas fa-clipboard"></i> </h1>

<a href="/admin/itemCreate" class="btn btn-primary btn-custom-color btn-rounded">Create New Menu <i class="fas fa-plus"></i></a><br>

<div class="row mt-4 mb-4">
    <div class="col">
        {{$items->links()}}
    </div>
    <div class="col text-right">
        <h4><mark><strong>Total Menu = {{$items->total()}}</strong></mark>  </h4>
    </div>
</div>
 
<table class="table table-bordered hovertable">
    <thead class="thead-dark">
        <tr>
            <th style="text-align:center">No</th>
            <th style="text-align:center">Name</th>
            <th style="text-align:center">Category</th>
            <th style="text-align:center">Price (IDR)</th>
            <th style="text-align:center">Menu image</th>
            <th style="text-align:center">Created at</th>
            <th style="text-align:center">Updated at</th>
            <th style="text-align:center">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($items as $p)
        <tr>
            
            <td style="vertical-align:center">{{ $p->id }}</td>
            <td style="vertical-align:center">{{ $p->name }}</td>
            <td>{{ $p->category }}</td>
            <td>{{ $p->price }}</td>
            <td>
                @if($p->image_path != null)
                <img src="{{ url($p->image_path) }}" width="100px">
                @endif
            </td>
            <td>{{ $p->created_at }}</td>
            <td>{{ $p->updated_at }}</td>
            <td>
                <a href="/admin/itemUpdate/{{ $p->id }}"class="btn btn-primary btn-custom-color"><i class="fas fa-edit"></i></a>
                |

                @if($p->deleted_at == null)
                <a href="/admin/itemDelete/{{ $p->id }}"class="btn btn-primary btn-custom-color"><i class="far fa-trash-alt"></i></a>
                @else
                <a href="/admin/itemRestore/{{ $p->id }}"class="btn btn-primary btn-custom-color"><i class="fas fa-trash-restore"></i></a>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>

    <a href="#top">Back to top of page</a>
@endsection