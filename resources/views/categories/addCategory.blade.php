@extends('index')


@section('content')
<h1 class="title">Thêm Danh Mục</h1>
<form action="{{url('createCategory')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Title : </label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="title" aria-describedby="emailHelp">
        @error('title')
        <span style="color:red">{{$message}}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Mô tả : </label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="description" aria-describedby="emailHelp">
        @error('description')
        <span style="color:red">{{$message}}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">ParentId : </label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="parentId" aria-describedby="emailHelp">
        @error('parentId')
        <span style="color:red">{{$message}}</span>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection