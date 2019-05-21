@extends('templates.layout')
@section('title') berichten @endsection
@section('content')
<div class="tabs is-centered is-toggle first-element">
    <ul>
        <li class="@if(!$isSend) is-active @endif">
            <a href="{{ route('show-user-messages') }}">Postvak in</a>
        </li>
        <li class="@if($isSend) is-active @endif">
            <a href="{{ route('show-user-send-messages') }}">Postvak uit</a>
        </li>
    </ul>
</div>
<div class="columns">
    <div class="column is-full">
            @include('dashboard.partials.messages', [
                    'messages' => $messages
                ])
    </div>
</div>
@endsection
