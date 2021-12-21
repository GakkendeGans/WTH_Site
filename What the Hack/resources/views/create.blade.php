<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ ucfirst($route) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="/{{ $route }}/store" method="POST">
                        @csrf
                        @if(isset($data))
                            <h1 class="mb-2">Edit</h1>
                        @else
                            <h1 class="mb-2">Create</h1>
                        @endif
                        @isset($data)
                            <input type="hidden" name="id" id="id" value="{{ $data->id }}">
                        @endisset
                        @for($i = 0; $i < count($cols); $i++)
                            @if($input_types[$i] == 'select')
                                <div class="mb-2">
                                    <label for="{{ $cols[$i] }}">{{ $desc[$i] }}</label>
                                    <select name="{{ $cols[$i] }}" id="{{ $cols[$i] }}">
                                        @foreach($select_options as $option)
                                            <option value="{{ $option->id }}">{{ $option->name }}</option>
                                        @endforeach
                                    </select>
                                    @error($cols[$i])
                                    <p class="mt-2 text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            @else
                                <div class="mb-2">
                                    <label for="{{ $cols[$i] }}">{{ $desc[$i] }}</label><br>
                                    <input type="{{ $input_types[$i] }}" name="{{ $cols[$i] }}" id="{{ $cols[$i] }}" required
                                           @isset($data)
                                           value="{{ $data->{$cols[$i]} }}"
                                        @endisset
                                    ><br>
                                    @error($cols[$i])
                                    <p class="mt-2 text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            @endif
                        @endfor
                        <div class="flex">
                            <a href="/{{ $route }}/index" class="mr-2">Cancel</a>
                            <input type="submit" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
