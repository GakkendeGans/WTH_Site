@extends('layouts/guest')

@section('content')
    <div>
        <div class="newsIndex__imageHeader"></div>
        <div class="pageContent container mx-auto">
            <div class="grid grid-cols-12 mb-16 mt-8 mx-32 gap-8">
                @if(isset($data[0]))
                    <article class="col-span-6 col-start-4">
                        <h1 class="pb-8">{{ $data[0]->title }}</h1>
                        <div class="pb-8 flex">
                            <p class="article__thinText pr-4">Author: TBD
{{--                                @php--}}
{{--                                    if (!$article->users) {--}}
{{--                                        echo 'Anonymous';--}}
{{--                                    } else {--}}
{{--                                        $authorAmount = count($article->users);--}}
{{--                                        for ($i = 0; $i < $authorAmount; $i++) {--}}
{{--                                            $author = $article->users[$i];--}}
{{--                                            if ($i != $authorAmount - 1) {--}}
{{--                                                echo $author->name . ', ';--}}
{{--                                            } else {--}}
{{--                                                echo $author->name;--}}
{{--                                            }--}}
{{--                                        }--}}
{{--                                    }--}}
{{--                                @endphp--}}
                            </p>
                            <p class="article__thinText">Date posted: {{ $data[0]->created_at }}</p>
                        </div>
                        @php
                            echo html_entity_decode($data[0]->body);
                        @endphp
                    </article>
                @else
                    This page has no article to show.
                @endif
            </div>
        </div>
    </div>
@endsection
