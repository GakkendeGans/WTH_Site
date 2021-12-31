@extends('layouts/app')

@section('content')
    <div class="container mx-auto h-full">
        <div class="grid grid-cols-12 mb-16 mx-32 mt-8 gap-8">
            <h1 class="col-span-12">{{ ucfirst($route).'s' }}</h1>
            <form action="/{{ $route }}/create" method="GET" class="mb-2">
                <input class="buttonPrimary button__primary button__primary__small" type="submit" value="create">
            </form>
            <table class="col-span-12 table">
                <tr>
                    @foreach($desc as $d)
                        <th>{{ $d }}</th>
                    @endforeach
                    <th>Options</th>
                </tr>
                @foreach($data as $d)
                    <tr>
                        @foreach($cols as $c)
                            <td>{{ $d->$c }}</td>
                        @endforeach
                        <td>
                            <form action="/{{ $route }}/{{ $d->id }}/edit" method="GET" class="inline-block mr-4">
                                <input class="textLink textLink__black" type="submit" value="edit">
                            </form>
                            <form action="/{{ $route }}/{{ $d->id }}/destroy" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <input class="textLink textLink__red" type="submit" value="delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection