@extends('index')

@section('content')
<h1 class="title">Thêm Sản Phẩm</h1>
<form method="" action="">
    <div class="form-group">
        <label for="exampleInputEmail1">Tên Sản Phẩm : </label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Giá : </label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection