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
<div class="form-group">
    <label for="tag_list">Tags</label>
    <select class="form-select" name="tags[]" id="tag_list" multiple aria-label="multiple select example">
        @foreach ($tags as $key => $tag)
            <option value="{{ $key }}"
                @isset($article)
                    @foreach ($article->tags as $articleTag)
                        {{ $articleTag->id === $key ? ' selected' : '' }}
                    @endforeach
                @endisset>
                {{ $tag }}</option>
        @endforeach
    </select>
</div>

<div class="form-group mt-3">
    <button type="submit" class="btn btn-primary form-control">{{ $submitButton }}</button>
</div>

@section('footer')
    <script>
        $('#tag_list').select2({
            placeholder: 'Choose a tag',
            // tags: true,
            // ajax: {
            //     dataType: 'json',
            //     url: 'api/tags',
            //     delay: 250,
            //     data: function(params) {
            //         return {
            //             q: params.term
            //         }
            //     },
            //     processResult: function($data) {
            //         return {
            //             results: data
            //         }
            //     }
            // }
        });
    </script>
@endsection

@include('errors.list')
