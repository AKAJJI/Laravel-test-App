@extends('navbar')

@section('content')
    <h1>Créer</h1>
    {!! BootForm::open()->action( route('news.store') ) !!}


        {!! BootForm::text('Title','title') !!}
        {!! BootForm::text('URL','slug') !!}
        {!! BootForm::textarea('Contenu','content') !!}
        {!! BootForm::select('Category','category_id',App\Category::pluck('name','id')) !!}
        {{-- {!! BootForm::select('Tags','tags[]',App\Tag::pluck('name','id'))->multiple(true) !! --}}
        {!! BootForm::select('Tags','tags_list[]',App\Tag::pluck('name','id'))->multiple(true) !!}
        {!! BootForm::submit('Envoyer','btn-primary') !!}

    {!! BootForm::close() !!}
@endsection
