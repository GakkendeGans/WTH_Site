@extends('layouts.guest')

@section('cssextra')
    <link href="/css/font-awesome.css" rel="stylesheet">
@endsection

@section('jsextra')

@endsection

@section('content')
    <div>
        <div class="newsIndex__imageHeader"></div>
        <div class="container mx-auto">
            <div class="grid grid-cols-12 py-16 gap-8">
                @auth
                    <section class="col-span-12">
                        <form method="GET" action="/article/create">
                            <input type="submit" class="button__primary .button__primary__verySmall" value="Create new article">
                        </form>
                        <div class="underline underline__leftToRight"></div>
                    </section>
                @endauth
                @forelse($articles as $article)
                    <article class="newsIndex__article col-span-4">
                        @if($article->header_image)
                        <img  src="images\uploads\{{$article->header_image}}" alt="image">
                        @endif
                        @auth
                        <a class="textLink" href="/article/{{ $article->id }}/edit">
                        @endauth
                        @if($article->title[0]!='.')
                            <div class="newsIndex__article__image mb-4"></div>
                            <h4>{{ $article->title }}</h4>
                        @else
                            <BR>
                        @endif
                        @auth
                        </a>
                        @endauth
                        <p>{!! htmlspecialchars_decode($article->body) !!}</p>
                    </article>
                @empty
                    <p class="col-span-12">There are no articles.</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
