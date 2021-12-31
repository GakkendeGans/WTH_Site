@extends('layouts/app')

@section('cssextra')
    <!-- <script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
    <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet"> -->
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> -->
    <link href="/css/summernote.css" rel="stylesheet">
    <script src="/js/jquery-3.5.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <link href="/css/font-awesome.css" rel="stylesheet">
    <script src="/js/summernote.js"></script>
@endsection

@section('jsextra')
    <script>
        $(document).ready(function() {
            // original in: https://github.com/summernote/summernote/blob/develop/src/js/settings.js
            $("#summernote").summernote(
                {
						toolbar: [
                                ['style', ['style']],
                                ['font', ['bold', 'underline', 'clear', 'strikethrough', 'superscript', 'subscript']],
                                ['fontname', ['fontname']],
                                ['color', ['color']],
                                ['para', ['ul', 'ol', 'paragraph', 'quote', 'clearer']],
                                ['table', ['table']],
                                ['insert', ['link', 'picture', 'hr', 'video', 'faicon']],
                                ['view', ['fullscreen', 'codeview', 'help']],
                            ]    
                }
            );
        });
        $('#summernote').show();
        // var quill = new Quill('#editor', {
        //     theme: 'snow'
        // });
    </script>
@endsection

@section('content')
    <div class="container mx-auto">
        <div class="grid grid-cols-12 pt-8 pb-16 gap-8">
            <form class="col-span-6 col-start-4" action="/{{ $route }}/store" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($data))
                    <h1 class="mb-8">Edit</h1>
                @else
                    <h1 class="mb-8">Create</h1>
                @endif
                @isset($data)
                    <input type="hidden" name="id" id="id" value="{{ $data->id }}">
                @endisset
                @for($i = 0; $i < count($cols); $i++)
                    @if($input_types[$i] == 'select')
                        <div class="mb-2 input__text">
                            <label for="{{ $cols[$i] }}">{{ $desc[$i] }}</label>
                            <select name="{{ $cols[$i] }}" id="{{ $cols[$i] }}">
                                @foreach($select_options as $option)
                                    <option value="{{ $option->id }}" @if( isset($data) && ($data->{$cols[$i]}==$option->id)) selected @endif>{{ $option->name }}</option>
                                @endforeach
                            </select>
                            @error($cols[$i])
                            <p class="mt-2 text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    @else
                        <div class="mb-2 input__text">
                            <label for="{{ $cols[$i] }}">{{ $desc[$i] }}</label>
                            @if($input_types[$i] == 'html')
                                <!-- <div id="editor" name="{{ $cols[$i] }}">@isset($data){{ $data->{$cols[$i]} }} @endisset</div> -->
                                <textarea style="display:none;" name="{{ $cols[$i] }}" id="summernote" rows="5" cols="80">@isset($data){!! htmlspecialchars_decode($data->{$cols[$i]}) !!}@endisset</textarea>
                            @elseif($input_types[$i] == 'file')
                                <input type="{{ $input_types[$i] }}" name="{{ $cols[$i] }}" id="{{ $cols[$i] }}">
                            @elseif($input_types[$i] == 'fileselect')
                                <div class="mb-2 input__text">
                                    <select name="{{ $cols[$i] }}" id="{{ $cols[$i] }}">
                                        <option value="-" @if($file_options[1]=='') selected @endif></option>
                                        @foreach($file_options[0] as $option)
                                            <option value="{{ $option }}"  @if($option == $file_options[1]) selected @endif>{{ $option }}</option>
                                        @endforeach
                                    </select>
                                    @error($cols[$i])
                                        <p class="mt-2 text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            @else
                                <input type="{{ $input_types[$i] }}" {{ ($input_types[$i] == 'password')?"autocomplete=new-password aria-autocomplete=list":'required'; }} name="{{ $cols[$i] }}" id="{{ $cols[$i] }}"
                                       @isset($data)
                                       value="{{ $data->{$cols[$i]} }}"
                                    @endisset
                                >
                            @endif
                            @error($cols[$i])
                            <p class="mt-2 text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    @endif
                @endfor
                <div class="flex justify-between pt-6">
                    <a href="/{{ $route }}" class="button__secondary button__secondary__verySmall">Cancel</a>
                    <button type="submit" class="button__primary button__primary__verySmall" value="Submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
