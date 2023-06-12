@extends('layout')
@section('title', 'LOGIN')
@section('content')

<div class="w-100 d-flex justify-content-center align-items-center flex-column py-5">
    
    <form name="formLogin" action= "{{Route('login_do')}}" class="d-flex flex-column p-5 text-center form-group px-5 gap-3" style="border-radius: 20px; background: #ffffff; box-shadow:  20px 20px 60px #d9d9d9, -20px -20px 60px #ffffff; border: none;">
        @csrf

        <h2>Login</h2>
        <div class="d-flex flex-column gap-5 p-3">
            <div class="d-flex flex-column gap-3">
                <input type="email" name="email"id="email" class="form-control" placeholder="email">
                <input type="password" name="password" id="password" class="form-control" placeholder="password">
            </div>
            <button class="btn btn-primary" type="submit">Logar</button>
        </div>
    </form>
</div>

@endsection