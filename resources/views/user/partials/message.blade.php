<div class="card">
    <div class="card-content">
        <div class="content">
            <h4 class="size-is-4">{{  $message->title }}</h4>
        </div>
        <div class="content">
            <small class="is-size-7">{{ $message->sender()->name }}</small>
            <br>
            <small class="is-size-7">{{ $message->created_at->getTranslatedShortDayName() }}&nbsp;{{ $message->created_at->toDateTimeString() }}</small>
        </div>
        <div class="content">
            {!! html_entity_decode($message->body) !!}
        </div>
    </div>
    @if(empty($isResponse))
        <footer class="card-footer">
            <a href="#response-to-{{ $message->id }}" class="reply-btn card-footer-item hover-success prevent-default" data-response="{{ $message->id }}">Antwoorden</a>
            <a href="#" onclick="$('#delete-message').submit();" class="card-footer-item hover-danger">Verwijderen</a>
        </footer>
        <form id="delete-message" action="{{ route('delete-user-message', ['message_id' => $message->id]) }}"method="POST">@csrf</form>
    @endif
</div>
