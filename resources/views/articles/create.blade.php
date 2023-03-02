@extends('app')

@section('content')
    <h1>Write a New Article</h1>
    <hr>
    <form action="{{ action(['App\Http\Controllers\ArticlesController', 'store']) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control">
        </div>

        <div class="form-group">
            <label for="body">Body</label>
            <textarea rows="10" name="body" id="body" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="published_at">Publish On</label>
            <input type="date" value="{{ date('Y-m-d') }}" name="published_at" id="published_at" class="form-control">
        </div>

        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary form-control">Add Article</button>
        </div>
    </form>
@endsection
