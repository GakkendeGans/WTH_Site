@extends('layouts/guest')

@section('cssextra')
    <link href="/css/font-awesome.css" rel="stylesheet">
@endsection

@section('jsextra')

@endsection

@section('content')
    <div>
        <div class="newsIndex__imageHeader"></div>
        <div class="pageContent container mx-auto">
            <div class="grid grid-cols-12 mb-16 mt-8 mx-32 gap-8">
                @auth
                    <section class="col-span-12 col-start-2">
                        <form method="GET" action="/article/create">
                            <input type="submit" class="button__primary .button__primary__verySmall" value="Create new article">
                        </form>
                        <div class="underline underline__leftToRight"></div>
                    </section>
                @endauth
                @if($articles == null)
                    This page has no article to show.
                @else
                    @foreach($articles as $article)
                        <article class="col-span-12 col-start-2">
                            @if($article->header_image)
                                <img  src="images\uploads\{{$article->header_image}}" alt="image">
                            @endif
                            @auth
                            <a class="textLink" href="/article/{{ $article->id }}/edit">
                            @endauth
                            @if($article->title[0]!='.')
                                <h1 class="pb-8">{{ $article->title }}</h1>
                            @else
                                <BR>
                            @endif
                            @auth
                            </a>
                            @endauth
                            <content class="summernoteContent">{!! htmlspecialchars_decode($article->body) !!}</content>
                        </article>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
