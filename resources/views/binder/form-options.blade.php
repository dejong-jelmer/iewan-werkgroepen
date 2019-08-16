@extends('templates.layout')
@section('title') Klapperformulier menu @endsection
@section('content')
    <div class="columns first-element">
        <div class="column is-full">
            <h5 class="title is-5">Klapper menu</h5>
        </div>
    </div>
    <div class="columns">
        <div class="column is-10 is-offset-1">
            <div class="tile is-ancestor">
                <div class="tile is-parent is-full">
                    <div class="tile is-child card">
                        <aside class="menu card-content">
                            <ul class="menu-list">
                                <li><button class="button is-info is-outlined is-fullwidth workgroup-button" href="{{ route('show-edit-binder-form') }}">Klapperformulier bewerken</button></li>
                                <li><button class="button is-info is-outlined is-fullwidth workgroup-button" href="{{ route('show-send-binder-form') }}">Klapperformulier versturen</button></li>

                            </ul>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
