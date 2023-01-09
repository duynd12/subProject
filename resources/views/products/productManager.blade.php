@extends('index')

@section('content')
<div class="product-manager">
    <div class="product-manager-title">
        <h1>Quản lý sản phẩm</h1>
        <form action="{{route('product.index')}}" method="get">
            <input type="text" name="search">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
        @if(Auth::user()->phanquyen==='admin')
        <button class="btn btn-primary">
            <a href="{{route('product.create')}}" style="color:white">
                Thêm sản phẩm
            </a>
        </button>
        @endif
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Giá</th>
                <th scope="col">Mô tả</th>
                <th scope="col">Số lượng còn</th>
                @if(Auth::user()->phanquyen==='admin')
                <th scope="col">Hanlde</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($data as $pro)
            <tr>
                <th scope="row">{{$pro['id']}}</th>
                <td>{{$pro['name']}}</td>
                <td>{{$pro['price']}}</td>
                <td>{{$pro['description']}}</td>
                <td>{{$pro['quantity']}}</td>
                <td>
                    @foreach($pro ->images as $image)
                    <img src="{{asset('/upload'."$image->product_img")}}">
                    @endforeach
                </td>

                @if(Auth::user()->phanquyen==='admin')
                <td>
                    <button class="btn btn-primary">
                        <a href="{{route('product.edit',$pro['id'])}}" style="color:white">
                            Edit
                        </a>
                    </button>
                    <button class="btn btn-danger">
                        <a href="{{route('product.destroy',$pro['id'])}}" style="color:white">
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