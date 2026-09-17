@extends('app')

@section('title')
    Contact
@endsection

@section('body')
<h1>Contact Form</h1>
<div class="form-body">
    <form action="{{ route('contact.submit') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" name="subject" id="subject" value="{{ old('subject') }}">
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" id="message" value="{{ old('message') }}"></textarea>
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
    </style>
@endpush
