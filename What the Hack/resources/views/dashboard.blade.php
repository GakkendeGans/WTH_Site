{{--<x-app-layout>--}}
{{--    <x-slot name="header">--}}
{{--        <h2 class="font-semibold text-xl text-gray-800 leading-tight">--}}
{{--            {{ __('Dashboard') }}--}}
{{--        </h2>--}}
{{--    </x-slot>--}}

{{--    <div class="py-12">--}}
{{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
{{--            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">--}}
{{--                <div class="p-6 bg-white border-b border-gray-200">--}}
{{--                    <a href="/user/index">User</a><br>--}}
{{--                    <a href="/menu/index">Menu</a><br>--}}
{{--                    <a href="/article/index">Article</a><br>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</x-app-layout>--}}

@extends('layouts/app')

@section('content')
    <div class="container mx-auto h-full">
        <div class="grid grid-cols-12 mb-16 mx-32 mt-8 gap-8">
            <h1 class="col-span-12">Dashboard</h1>
            <ul class="col-span-12">
                <li><a class="textLink" href="/user">User</a></li>
                <li><a class="textLink" href="/menu">Menu</a></li>
                <li><a class="textLink" href="/cat">Category</a></li>
                <li><a class="textLink" href="/article">Article</a></li>
            </ul>
        </div>
    </div>
@endsection
