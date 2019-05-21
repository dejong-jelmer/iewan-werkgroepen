@extends('templates.layout')
@section('title') {{ $workgroup->name }} @endsection
@section('content')
<div class="columns first-element">
    <div class="column is-full">
        <h2 class="is-size-2">{{ $workgroup->name }}</h2>
        @include('user.partials.send-message',[
                    'workgroup' => $workgroup,
                    'at' => 'workgroup',
                    'route' =>  route('send-workgroup-message', [
                        'workgroup_id' => $workgroup->id,
                       ]),
                    'hidden' => true
                ])
    </div>
</div>
 @if(!auth()->user()->inWorkgroup($workgroup))
    <form name="join-workgroup-form" id="join-workgroup-form" action="{{ route('join-workgroup', ['workgroup_id' => $workgroup->id]) }}" method="POST">@csrf</form>
@else
    <form name="leave-workgroup-form" id="leave-workgroup-form" action="{{ route('leave-workgroup', ['workgroup_id' => $workgroup->id]) }}" method="POST">@csrf</form>
@endif
<div class="tile is-ancestor">
    <div class="tile is-parent is-3">
        <div class="tile is-child card">
            <aside class="menu card-content">
                <ul class="menu-list">
                    @if(!auth()->user()->inWorkgroup($workgroup))
                        <li><button class="button is-success is-outlined is-fullwidth workgroup-button" href="#" onclick="$('#join-workgroup-form').submit();">Ga bij</button></li>
                        <li><button class="toggle button is-info is-outlined is-fullwidth workgroup-button" href="#" data-target="message-form">Stuur bericht</button></li>
                    @endif
                        <li><button class="toggle button is-info is-outlined is-fullwidth workgroup-button" href="#">Bestanden</button></li>
                        <li><button class="toggle button is-info is-outlined is-fullwidth workgroup-button" href="{{ route('workgroup-members',['workgroup_id' => $workgroup->id]) }}">Leden</button></li>
                    @if(auth()->user()->inWorkgroup($workgroup))
                        <li><button class="button is-danger is-outlined is-fullwidth workgroup-button" href="#" onclick="$('#leave-workgroup-form').submit();">Verlaten</button></li>
                    @endif


                </ul>
            </aside>
        </div>
    </div>
    <div class="tile is-vertical is-parent">
        <div class="tile is-child card">
            <div class="card-content">
                @if(auth()->user()->inWorkgroup($workgroup))
                <i class="fas fa-pencil-alt is-pulled-right toggle" data-target="text-editor"></i>
                {{-- <div id="text-editor">
                    <textarea name="body" class="textarea editor"></textarea>
                </div> --}}
                @endif
                <p>Hier komt werkgroep tekst</p>
                text
            </div>
        </div>
        @if(!auth()->user()->inWorkgroup($workgroup))
            <div class="tile is-child card">
                 <div class="card-content">
                    <div class="column is-6 dashboard-card">
                    @include('dashboard.partials.messages', [
                            'messages' => $workgroup->messages
                        ])
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
