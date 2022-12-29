@extends('index')

@section('content')
<div class="user-manager">
    <div class="user-manager-title">
        <h1>Quản lý người dùng</h1>
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
                    <button class="btn btn-danger">Block</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection