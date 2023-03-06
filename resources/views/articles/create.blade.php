@extends('app')

@section('content')
    <h1>Write a New Article</h1>
    <hr>
    <form action="{{ route('articles.store') }}" method="POST">
        @csrf
        @include('articles.form', ['submitButton' => 'Add Article'])
    </form>
@endsection
