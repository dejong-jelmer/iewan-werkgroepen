@extends('layout.layout')
@section('title') Klapperformulier versturen @endsection
@section('content')
    <div class="columns first-element">
        <div class="column is-full">
            <h5 class="title is-5">Klapperformulier versturen</h5>
            <form action="{{ route('post-send-binder-form') }}" method="POST">
                @csrf
                    <div class="field">
                        <label class="label">Naam</label>
                        <div class="control">
                            <input name="name" class="input @if($errors->has('name')) is-danger @endif" type="text" placeholder="Naam ontvanger Klapperformulier">
                            @if($errors->has('name'))
                                <p class="has-text-danger">{{ $errors->first('name') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Email</label>
                        <div class="control">
                            <input name="email" class="input @if($errors->has('email')) is-danger @endif" type="email" placeholder="Email ontvanger Klapperformulier">
                             @if($errors->has('email'))
                                <p class="has-text-danger">{{ $errors->first('email') }}</p>
                            @endif
                        </div>
                    </div>
                <button class="button is-primary is-pulled-right">Versturen</button>
            </form>
        </div>
    </div>
@endsection
