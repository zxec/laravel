<div class="form-group">
    <label for="title">Title</label>
    <input value="@isset($article){{ $article->title }}@endisset" type="text" name="title"
        id="title" class="form-control">
</div>
<div class="form-group">
    <label for="body">Body</label>
    <textarea rows="10" name="body" id="body" class="form-control">
@isset($article)
{{ $article->body }}
@endisset
</textarea>
</div>
<div class="form-group">
    <label for="published_at">Publish On</label>
    <input value="@isset($article){{ $article->published_at }}@endisset" type="date"
        name="published_at" id="published_at" class="form-control">
</div>
<div class="form-group mt-3">
    <button type="submit" class="btn btn-primary form-control">{{ $submitButton }}</button>
</div>
@include('errors.list')
