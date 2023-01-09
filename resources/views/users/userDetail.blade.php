@extends('index')

@section('content')
<h1 class="title">Chi tiết người dùng</h1>
<div class="form-group">
    <label for="exampleInputEmail1">Tên : </label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="name" value={{$data->user_id}} readonly>
</div>
<div class="form-group">
    <label for="exampleInputEmail1">Số điện thoại : </label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="price" value={{$data->numberPhone}} readonly>
</div>
<div class="form-group">
    <label for="exampleInputEmail1">Địa chỉ : </label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="price" value={{$data->address}} readonly>
</div>
<div class="form-group">
    <label for="exampleInputEmail1">Giới tính : </label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="description" value={{$data->gender}} readonly>
</div>
<div class="form-group">
    <label for="exampleInputEmail1">Ngày sinh : </label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="quantity" value={{$data->dob}} readonly>
</div>
@endsection