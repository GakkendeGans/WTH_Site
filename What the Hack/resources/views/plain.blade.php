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
                    <section class="col-span-12">
                        <form method="GET" action="/article/create">
                            <input type="submit" class="button__primary .button__primary__verySmall" value="Create new article">
                        </form>
                        <div class="underline underline__leftToRight"></div>
                    </section>
                @endauth
                @if($articles == null)
                    This page has no article to show.
                @else
                    <style>
                        .collapsible {
                            max-height: 100px;
                            overflow: hidden;
                        }
                    </style>
                    <article class="col-span-12 col-start-2" style="font-size: 0.7em;">
                        <i>Click on itemtext to see more</i>
                    </article>
                    @foreach($articles as $article)
                        <article class="col-span-12 col-start-2">
                            @if($article->header_image)
                                <img  src="images\uploads\{{$article->header_image}}" alt="image">
                            @endif
                            @auth
                            <a class="textLink" href="/article/{{ $article->id }}/edit">
                            @endauth
                            @if($article->title[0]!='.')
                                <h1>{{ $article->title }}</h1>
                            @else
                                <BR>
                            @endif
                            @auth
                            </a>
                            @endauth
                            <div class="collapsible">
                            <content class="summernoteContent">{!! htmlspecialchars_decode($article->body) !!}</content>
                            </div>
                        </article>
                    @endforeach
                    <script>
                        var coll = document.getElementsByClassName("collapsible");
                        var i;

                        for (i = 0; i < coll.length; i++) {
                            coll[i].addEventListener("click", function() {
                                var active = document.getElementsByClassName("active");
                                for (i = 0; i < active.length; i++) {
                                    if(!active[i].isEqualNode(this)) {
                                        active[i].style.maxHeight = null;
                                        active[i].classList.toggle("active");
                                    }
                                }
                                this.classList.toggle("active");
                                if (this.style.maxHeight){
                                    this.style.maxHeight = null;
                                } else {
                                    this.style.maxHeight = this.scrollHeight + "px";
                                } 
                            });
                        }
                    </script>
                @endif
            </div>
        </div>
    </div>
@endsection
