@extends('navbar');


@section('content')
    <h1> Success</h1>
    <p>
    <a class="btn btn-primary" href="{{ action('LinksController@show',['id' => $link->id]) }}">
            {{ route('link.show',$link)  }}

        </a>
    </p>

@endsection
