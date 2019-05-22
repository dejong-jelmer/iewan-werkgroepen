@extends('templates.layout')
@section('title') Forum: @if(!empty($post)) {{ $post->title }} @endif @endsection
@section('content')
<div class="columns first-element">
    <div class="column is-full">
        @include('dashboard.partials.forum.post', [
                'post' => $post,
                'showBody' => true,
                'allowResponse' => true
            ])
        @forelse($post->responses as $response)
                @include('dashboard.partials.forum.post', [
                    'post' => $response,
                    'showBody' => true,
                    'allowResponse' => false
                ])
            @empty
            @endforelse
            @include('dashboard.partials.forum.response', ['post' => $post])
    </div>
</div>

@endsection
