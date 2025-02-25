<!DOCTYPE html>
<html>
<head>
@section('content')
    <h1>{{ $news->title }}</h1>
    <p>By: {{ $news->author }}</p>
    @if ($news->image)
        <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" width="300">
    @endif
    <p>{{ $news->content }}</p>
    <a href="{{ route('news.index') }}">Back to News</a>
</body>
</html>
