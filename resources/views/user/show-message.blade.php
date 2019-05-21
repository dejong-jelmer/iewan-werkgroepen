@extends('templates.layout')
@section('title') bericht - {{ $message->title }}  @endsection
@section('content')
    <div class="columns first-element">
        <div class="column is-full">
             @forelse($message->responses->reverse() as $response)
                @include('user.partials.message',[
                        'message' => $response,
                        'isResponse' => true
                    ])
            @empty
            @endforelse
            @include('user.partials.message',[
                        'message' => $message
                    ])
         </div>
    </div>
    <div class="columns">
        <div class="column is-full">
            @include('user.partials.send-message',[
                        'message' => $message,
                        'route' => route('send-message-response', [
                            'user_id' => $message->sender()->id,
                            'message_id' => $message->id
                           ])
                    ])
         </div>
    </div>
@endsection
