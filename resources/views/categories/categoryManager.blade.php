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
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>
                    <button class="btn btn-primary">
                        <a href="{{route('edit-category')}}">
                            Edit
                        </a>
                    </button>
                    <button class="btn btn-danger">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection