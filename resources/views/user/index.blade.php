@extends('templates.layout')
@section('title') @isset($user) {{ $user->name }} @endisset @endsection
@section('content')
<div class="columns first-element">
    <div class="column is-full">
        <h5 class="title is-5">{{ ucfirst($user->name) }}</h5>
        @include('user.partials.send-message',[
                    'user' => $user,
                    'route' => route('send-message', [
                        'user_id' => $user->id,
                       ])
                ])
     </div>
</div>
@endsection
