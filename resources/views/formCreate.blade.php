@extends('layout')
@section('title', 'CREATE USER')
@section('content')

<div class="w-100 d-flex justify-content-center align-items-center flex-column py-5">
    
    <form name="formCreate" action="{{Route('store')}}" class="d-flex flex-column text-center p-4 px-5 gap-3 form-group " style="border-radius: 20px; background: #ffffff; box-shadow:  20px 20px 60px #d9d9d9, -20px -20px 60px #ffffff; border: none;">
        @csrf
    
        <h2>Cadastrar</h2>
        <div class="d-flex flex-column gap-5 p-3">
            <div class="d-flex flex-column gap-3">
                <input type="text" name="name" class="form-control" placeholder="name">
                <input type="email" name="email" class="form-control" placeholder="email">
                <input type="password" name="password"  class="form-control" placeholder="password">
            </div>
            <button class="btn btn-primary" type="submit">Cadastrar</button>
        </div>
    </form>
</div>
@endsection