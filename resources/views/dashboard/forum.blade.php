@extends('templates.layout')
@section('title') Forum @endsection
@section('content')
<div class="columns first-element">
    <div class="column is-full">
        <div class="field">
            <div class="control">
                <button class="button is-primary is-outlined is-fullwidth toggle-forumpost-field">Maak een nieuw forumbericht aan</button>
            </div>
        </div>
    </div>
</div>

@include('dashboard.partials.forum.create-post')

<div>
    @forelse($posts as $post)
        @include('dashboard.partials.forum.post', [
                'post' => $post,
                'showBody' => false,
                'allowResponse' => false
            ])
    @empty
        <p>Geen berichten op het forum</p>
    @endforelse
</div>
@endsection



