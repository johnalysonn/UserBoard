@extends('layout')
@section('title', 'LIST USERS')
@section('content')

<div class="container-fluid d-flex gap-2 flex-column p-4 py-5" style="border-radius: 20px; background: #ffffff; box-shadow:  20px 20px 60px #d9d9d9, -20px -20px 60px #ffffff; border: none;">
    <table class="table table-white table-hover" id="tableList" >
        <legend>Users</legend>

        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr class="border border-0">
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
            @endforeach
            </tbody>
    </table>

@endsection