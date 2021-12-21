@extends('layouts.guest')

@section('content')
    <div>
        <div class="newsIndex__imageHeader"></div>
        <div class="container mx-auto">
            <div class="grid grid-cols-12 py-16 gap-8">
                @auth
                    <section class="col-span-12">
                        <form method="GET" action="/article/create">
                            <input type="submit" class="button__primary button__primary__small" value="Create new article">
                        </form>
                        <div class="underline underline__leftToRight"></div>
                    </section>
                @endauth
                @forelse($articles as $article)
                    <article class="newsIndex__article col-span-4">
                        <a class="textLink" href="/news/article/{{ $article->id . '-' . str_replace(' ', '-',strtolower($article->title)) }}">
                            <div class="newsIndex__article__image mb-4"></div>
                            <h4>{{ $article->title }}</h4>
                        </a>
                    </article>
                @empty
                    <p class="col-span-12">There are no articles.</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
