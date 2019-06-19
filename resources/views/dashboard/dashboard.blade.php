@extends('templates.layout')
@section('title') Dashboard @endsection
@section('content')
    <div class="columns first-element">
        <div class="column is-full">
            <h5 class="title is-5">Werkgroepen</h5>
            <div id="workgroups" class="columns is-multiline">
                @forelse(auth()->user()->workgroups as $workgroup)
                    <div class="column is-4">
                        @include('dashboard.partials.workgroup', [
                            'workgroup' => $workgroup
                        ])
                    </div>
                        @empty
                            <p>Je zit nog niet in een werkgroep</p>
                @endforelse
            </div>
        </div>
    </div>
    <div class="columns">
        {{-- <div class="column is-4 dashboard-card">
                @include('dashboard.partials.messages', [
                        'messages' => $messages
                    ])
        </div> --}}
        <div class="column is-4 dashboard-card">
                @include('dashboard.partials.forumposts', [
                        'forumPosts' => $forumPosts
                    ])
        </div>
        <div class="column is-4 dashboard-card">
                @include('dashboard.partials.binder_forms', [
                        'binderForms' => $binderForms
                    ])
        </div>
    </div>

@endsection

