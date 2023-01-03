@extends('index')

@section('content')
<h1 class="title">Thêm Ảnh Sản Phẩm</h1>
<form action="{{url('createImageProduct')}}" method="post" accept="image/*" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <!-- <input type="text" id="exampleInputEmail1" name="product_id" /> -->
        <label for="exampleInputEmail1">Ảnh Sản Phẩm : </label>
        <input type="file" id="exampleInputEmail1" name="images[]" multiple="true" />
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection