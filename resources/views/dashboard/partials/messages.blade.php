<div class="card">
    <header class="card-header">
        <p class="card-header-title">
            <a class="has-text-dark" href="{{ route('show-user-messages') }}">Nieuwe berichten</a>
        </p>
    </header>
    <div class="card-table">
        <div class="content">
            <table class="table is-fullwidth is-narrow">
                @forelse($messages as $message)
                    @if($loop->first)
                    <thead>
                        <tr>
                            <th></th>
                            <th>Van</th>
                            <th>Onderwerp</th>
                        </tr>
                    </thead>
                    <tbody>
                        @endif
                        <tr class="message-row" data-target="{{ route('show-user-message', ['message_id' => $message->id]) }}">
                            <td class="has-text-centered">
                                @if(auth()->user()->isUnreadMessage($message->id))
                                    <i class="far fa-envelope"></i>
                                @else
                                    <i class="far fa-envelope-open"></i>
                                @endif
                            </td>
                            <td>{{ $message->sender()->name }}</td>
                            <td>{{ $message->title }}</td>
                        </tr>
                    </tbody>
                @empty
                    <td>Geen (nieuwe) berichten</td>
                @endforelse
            </table>
        </div>
    </div>
    @if(method_exists($messages, 'links'))
        <footer class="card-footer" style="display: block; padding: 1em;">
            {{ $messages->links('vendor.pagination.bulma', ['bulmaClasses' => 'is-small is-left', 'next' => 'Volgende', 'previous' => 'Vorige']) }}
        </footer>
    @endif
</div>
