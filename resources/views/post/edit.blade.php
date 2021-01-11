@php /** @var \App\Models\Post $post */ @endphp

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="my-3">
            <a href="/" class="text-blue-500 underline">Back to main page</a>
        </div>

        <div class="text-2xl font-semibold">Edit post</div>
        <p class="text-gray-500 mb-3">You can edit your posts here.</p>
        <hr>
        <livewire:post-edit :post="$post"/>
    </div>
@endsection
