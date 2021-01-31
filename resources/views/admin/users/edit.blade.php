@extends('layouts.app')


@section('content')

<div class="container">
<h1>Edit</h1>

{!! BootForm::open(route('admin.users.update', $user))->put() !!}

    {!! BootForm::text('Name','name',$user->name) !!}
    {!! BootForm::text('Email','email',$user->email) !!}
    {!! BootForm::select('Role','role[]',$role)->multiple(true)->select($user->roles->pluck('id')->toArray()) !!}
    {!! BootForm::submit('Envoyer','btn-primary') !!}

{!! BootForm::close() !!}
</div>
@endsection
