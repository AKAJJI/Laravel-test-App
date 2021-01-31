@extends('navbar')


@section('content')
 {{-- <pre>{{var_dump(Session::all())}}</pre> --}}

 {{-- <pre>{{var_dump(Session::get('test','message d\'erreur'))}}</pre> --}}
 {{-- sinon ca affiche null --}}

 <pre>{{var_dump(Session::has('test'))}}</pre>
@include('flash')
    @foreach($posts as $post)
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->content}}</p>
        @if( $post->category)
            <p><em>{{ $post->category->name}}</em></p>
        @endif
        <a class="btn btn-primary" href="{{ route('news.edit',$post)}}">Editer</a>
    @endforeach

@stop

