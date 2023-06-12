@extends('layout')
@section('title', 'EDIT USER')
@section('content')

<div class="w-100 d-flex justify-content-center align-items-center flex-column py-5">
    
    <form id="formEdit" name="formEdit" action ="{{Route('update', $user->id)}}" class="d-flex flex-column gap-3 p-4 px-5 text-center form-group" style="border-radius: 20px; background: #ffffff; box-shadow:  20px 20px 60px #d9d9d9, -20px -20px 60px #ffffff; border: none;">
        @csrf

        <h2>Editar</h2>
        <div class="d-flex flex-column gap-5">
            <div class="d-flex flex-column gap-3 w-100">
                <input type="text" name="name" class="form-control" value="{{$user->name}}">
                <input type="email" name="email" class="form-control" value="{{$user->email}}">
                <input type="password" name="password"  class="form-control" placeholder="password">
            </div>
            <button class="btn btn-primary" type="submit">Editar</button>
        </div>

    </form>
</div>
@endsection