@extends('navbar')

@section('content')
    <h1>Editer</h1>
    {{-- {!! BootForm::open()->action( route('news.update', $post) )->put() !!} --}}
    @include('errors');

    {!! BootForm::open(route('news.update', $post))->put() !!}

        {!! BootForm::text('Title','title',$post->title) !!}
        {!! BootForm::text('URL','slug',$post->slug) !!}
        {!! BootForm::textarea('Contenu','content')->defaultValue($post->content) !!}
        {!! BootForm::checkbox('Online','online')->checked($post->online) !!}
        {!! BootForm::select('Category','category_id',$categories)->select($post->category_id) !!}
        {{-- {!! BootForm::select('Tags','tags[]',$tags/* OR App\Tag::pluck('name','id')*/)->multiple(true)->select($post->tags->pluck('id')->toArray()) !!} --}}
        {!! BootForm::select('Tags','tags_list[]',$tags)->multiple(true)->select($post->tags_list) !!}
        {!! BootForm::submit('Envoyer','btn-primary') !!}

    {!! BootForm::close() !!}
@endsection
