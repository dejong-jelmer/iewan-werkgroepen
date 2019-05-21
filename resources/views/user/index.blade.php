@extends('templates.layout')
@section('title') @isset($user) {{ $user->name }} @endisset @endsection
@section('content')
<div class="columns first-element">
    <div class="column is-full">
        <h2 class="is-size-2">{{ $user->name }}</h2>
        @include('user.partials.send-message',[
                    'user' => $user,
                    'route' => route('send-message', [
                        'user_id' => $user->id,
                       ])
                ])
     </div>
</div>
@endsection
