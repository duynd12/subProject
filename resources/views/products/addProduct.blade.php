@extends('index')

@section('content')
<h1 class="title">Thêm Sản Phẩm</h1>
<form action="{{url('createProduct')}}" method="post" accept="image/*" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Tên Sản Phẩm : </label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="name">
        @error('name')
        <span style="color:red">{{$message}}</span>
        @enderror
    </div>
    <label for="cars" style="margin-bottom:10px;">Danh mục : </label>
    <select name="categories[]" id="cars" multiple multiselect-hide-x="true">
        @foreach($data as $category)
        <option value="{{$category['id']}}">{{$category['title']}}</option>
        @endforeach
        @error('categories')
        <span style="color:red">{{$message}}</span>
        @enderror
    </select>

    <div class="form-group">
        <label for="exampleInputEmail1">Giá : </label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="price">
        @error('price')
        <span style="color:red">{{$message}}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Mô tả : </label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="description">
        @error('description')
        <span style="color:red">{{$message}}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Số lượng còn : </label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="quantity">
        @error('quantity')
        <span style="color:red">{{$message}}</span>
        @enderror
    </div>
    <div class="form-group">
        <!-- <input type="text" id="exampleInputEmail1" name="product_id" /> -->
        <label for="exampleInputEmail1">Ảnh Sản Phẩm : </label>
        <input type="file" id="exampleInputEmail1" name="images[]" multiple="true" />
        @error('images')
        <span style="color:red">{{$message}}</span>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection