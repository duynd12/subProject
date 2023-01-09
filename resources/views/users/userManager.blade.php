@extends('index')

@section('content')
<div class="user-manager">
    <div class="user-manager-title">
        <h1>Quản lý người dùng</h1>
        <form action="{{route('user.index')}}" method="get">
            <input type="text" name="search">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">UserName</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->username}}</td>
                <td>{{$user->email}}</td>
                <td>
                    <button class="btn btn-primary">
                        <a href="{{route('user.getUserById',$user->id)}}" style="color:white">
                            Xem Chi Tiết
                        </a>
                    </button>
                </td>
                @if(Auth::user()->phanquyen==='admin')
                @if(($user->deleted_at) === null)
                <td>
                    <button class="btn btn-danger">
                        <a href="{{route('user.destroy',$user->id)}}" style="color:white">
                            Block
                        </a>
                    </button>
                </td>
                @endif
                @if(($user->deleted_at) !== null)
                <td>
                    <button class="btn btn-primary">
                        <a href="{{route('user.unlock',$user->id)}}" style="color:white">
                            Mở Block
                        </a>
                    </button>
                </td>
                @endif
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $data->appends(Request::all())->links() !!}
</div>
@endsection