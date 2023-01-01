@extends('index')

@section('content')
<div class="category-manager">
    <div class="category-manager-title">
        <h1>Quản lý danh mục</h1>
        <button class="btn btn-primary">
            <a href="{{route('add-category')}}">
                Thêm danh mục
            </a>
        </button>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">title</th>
                <th scope="col">description</th>
                <th scope="col">ParentId</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $cate)
            <tr>
                <th scope="row">{{$cate['id']}}</th>
                <td>{{$cate['title']}}</td>
                <td>{{$cate['description']}}</td>
                <td>{{$cate['parentId']}}</td>
                <td>
                    <button class="btn btn-primary">
                        <a href="{{route('show-edit-category',$cate['id']) }}">
                            Edit
                        </a>
                    </button>
                    <button class="btn btn-danger">
                        <a href="{{route('delete-category',$cate['id']) }}">
                            Delete
                        </a>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection