@extends('navbar');


@section('content')
    <h1> Raccourcir un nouveau lien</h1>

<form action="{{ route('link.store')}}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label for="url">Lien a raccourcir</label>
            <input type="text" name="url" id="url" placeholder="http://....." class="form-control">
        </div>
        <div class="form-group">
            <button class="btn btn-primary"> Raccourcir </button>
        </div>
    </form>
@endsection
