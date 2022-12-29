@extends('index')

@section('content')
<div class="product-manager">
    <div class="product-manager-title">
        <h1>Quản lý sản phẩm</h1>
        <button class="btn btn-primary">
            <a href="{{route('add-product')}}">
                Thêm sản phẩm
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
                        <a href="{{route('edit-product')}}">
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