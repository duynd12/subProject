@extends('index')

@section('content')
<h1 class="title">Sửa Sản Phẩm</h1>
<form method="post" enctype="multipart/form-data" action="{{route('product.update',$data['id'])}}">
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Tên Sản Phẩm : </label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="{{$data['name']}}">
                @error('name')
        <span style="color:red">{{$message}}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Giá : </label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="price" value="{{$data['price']}}">
    @error('price')
        <span style="color:red">{{$message}}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Mô tả : </label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="description" value="{{$data['description']}}">
    @error('description')
        <span style="color:red">{{$message}}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Số lượng còn : </label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="quantity" value="{{$data['quantity']}}">
    @error('quantity')
        <span style="color:red">{{$message}}</span>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection