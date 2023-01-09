@extends('index')

@section('content')
<div class="category-manager">
    <div class="category-manager-title">
        <h1>Quản lý danh mục</h1>
        <form action="{{route('category.index')}}" method="get">
            <input type="text" name="search">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
        @if(Auth::user()->phanquyen==='admin')
        <button class="btn btn-primary">
            <a href="{{route('category.create')}}" style="color:white">
                Thêm danh mục
            </a>
        </button>
        @endif
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">title</th>
                <th scope="col">description</th>
                <th scope="col">ParentId</th>
                @if(Auth::user()->phanquyen==='admin')
                <th scope="col">Action</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($data as $cate)
            <tr>
                <th scope="row">{{$cate['id']}}</th>
                <td>{{$cate['title']}}</td>
                <td>{{$cate['description']}}</td>
                <td>{{$cate['parentId']}}</td>
                @if(Auth::user()->phanquyen==='admin')
                <td>
                    <button class="btn btn-primary">
                        <a href="{{route('category.edit',$cate['id']) }}" style="color:white">
                            Edit
                        </a>
                    </button>
                    <button class="btn btn-danger">
                        <a href="{{route('category.destroy',$cate['id']) }}" style="color:white">
                            Delete
                        </a>
                    </button>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$data->links()}}
</div>
@endsection