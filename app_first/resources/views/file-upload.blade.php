@extends('app')

@section('title')
    File Upload
@endsection

@section('body')
<h1>File Upload</h1>
<div class="form-body">
    <form action="{{ route('file.submit') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="file">File</label>
            <input type="file" name="file" id="file">
        </div>
        @if($errors->any())
            <div class="form-errors">
                @foreach ($errors->all() as $error)
                    <p class="form-error">
                        {{ $error }}
                    </p>
                @endforeach
            </div>
        @endif
        <button type="submit">Submit</button>
    </form>
</div>
<div class="file-list">
    @foreach ($files as $file)
        <div class="file-list__element">
            <img class="file-list__element--image" src="{{ asset($file->file_path) }}" alt="{{ $file->file_name }}">
            <a href="{{ route('file.download', ['file_name' => $file->file_name]) }}">Download file</a>
            <a href="{{ route('file.delete', ['file_name' => $file->file_name]) }}">Delete file</a>
        </div>
    @endforeach
</div>

@endsection

@push('css')
    <style>
        * {
            font-size: 16px;
        }

        h1 {
            font-size: 32px;
            text-align: center;
        }

        .form-body {
            width: 100%;
            display: flex;
            justify-content: center;
        }

        form {
            border: 1px solid black;
            border-radius: 2px;
            padding: 10px;
            display: flex;
            flex-direction: column;
            gap: 20px;
            justify-content: center;
        }

        .form-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
        }

        .file-list {
            width: 100%;
            display: grid;
            justify-content: center;
            grid-template-columns: repeat(3, auto);
            gap: 50px;
        }

        .file-list__element {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .file-list__element--image {
            width: 200px;
        }
    </style>
@endpush
