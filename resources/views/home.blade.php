@extends('layout')
@section('title', 'HOME')
@section('content')

@if(Auth::check())
<div class="px-3 me-2">
    <p class="fs-6 fw-bold d-flex align-items-center gap-2"><i class='bx bxs-circle bx-tada bx-flip-horizontal' style='color:#14c920' ></i> <label class="fw-normal fs-4 text-uppercase">{{$user_auth->name}}</label></p>
</div>
@endif
<div class="d-flex flex-column gap-3 mt-2">
    <div class="p-3">
        <h1>Users</h1>
    </div>

    <div class="d-flex gap-2 container-fluid flex-wrap">
        @foreach($users as $user)
            <div class="card" style="width: 18rem; border-radius: 20px; background: #ffffff; box-shadow:  20px 20px 60px #d9d9d9, -20px -20px 60px #ffffff; border: none;">
                <div class="card-body">
                    <h5 class="card-title">{{$user -> name}}</h5>
                    <p class="card-text">Email: {{$user->email}}</p>
                    <p class="card-text"><small>Created in {{($user->created_at)->format('d/m/y')}}</small></p>

                    <div class="btn-group w-100 gap-3">
                        <a href="{{Route('edit', $user->id)}}" class="btn border border-primary"><i class='bx bxs-edit text-primary'></i></a>

                        <form name="formDelete" action="{{Route('destroy', $user->id)}}">
                            @csrf
                                @method('delete')
                            <button type="submit" class="btn border border-danger"><i class='bx bxs-trash text-danger'></i></button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection