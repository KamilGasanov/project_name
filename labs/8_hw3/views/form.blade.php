<form class="crud-form" method="post" action="{{ $comment->exists ? route('lab8.articles.comments.update', [$article, $comment]) : route('lab8.articles.comments.store', $article) }}">
    @csrf
    @if ($comment->exists)
        @method('PUT')
    @endif

    <div>
        <label for="author">Имя</label>
        <input id="author" name="author" value="{{ old('author', $comment->author) }}" maxlength="100" required
            @error('author') aria-invalid="true" aria-describedby="author-error" @enderror>
        @error('author') <p id="author-error" class="crud-error">{{ $message }}</p> @enderror
    </div>
    <div>
        <label for="body">Комментарий</label>
        <textarea id="body" name="body" rows="4" maxlength="3000" required
            @error('body') aria-invalid="true" aria-describedby="body-error" @enderror>{{ old('body', $comment->body) }}</textarea>
        @error('body') <p id="body-error" class="crud-error">{{ $message }}</p> @enderror
    </div>
    <button class="crud-button" type="submit">{{ $comment->exists ? 'Сохранить' : 'Добавить комментарий' }}</button>
</form>
