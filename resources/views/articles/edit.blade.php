@extends('app')

@section('content')
    <h1>Edit: {{ $article->title }}</h1>
    <hr>
    <form action="{{ route('articles.update', $article->id) }}" method="POST">
        @csrf
        @method('patch')
        @include('articles.form', ['submitButton' => 'Update Article'])
    </form>
@endsection
