@extends('templates.layout')
@section('title') @isset($user) profiel - {{ $user->name }} @endisset @endsection
@section('content')
<form action="{{ route('user-profile-post') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="columns first-element">
        <div class="column is-6">
            <div class="card">
                <div class="card-image">
                    <figure class="image is-1x1">
                        <img id="profile-image" src="https://bulma.io/images/placeholders/480x480.png" alt="Placeholder image">
                    </figure>
                </div>
            </div>
        </div>
        <div class="column is-6">
            <div class="field">
                <label class="label">Naam</label>
                <div class="control @if($errors->count()) is-hidden @endif">
                    <p>{{ $user->name }}</p>
                </div>
                <div class="control has-icons-left  profile-field @if(!$errors->count()) is-hidden @endif">
                    <span class="icon is-small is-left">
                        <i class="fas fa-user"></i>
                    </span>
                    <input name="name" class="input @if($errors->has('name')) is-danger @endif" type="text" placeholder="{{ $user->name }}">
                    @if($errors->has('name'))
                        <p class="has-text-danger">{{ $errors->first('name') }}</p>
                    @endif
                </div>
            </div>
            <div class="field">
                <label class="label">Emailadres</label>
                <div class="control @if($errors->count()) is-hidden @endif">
                    <p>{{ $user->email }}</p>
                </div>
                <div class="control has-icons-left profile-field @if(!$errors->count()) is-hidden @endif">
                    <span class="icon is-small is-left">
                        <i class="fas fa-envelope"></i>
                    </span>
                    <input class="input" type="email" placeholder="{{ $user->email }}">
                    @if($errors->has('email'))
                        <p class="has-text-danger">{{ $errors->first('email') }}</p>
                    @endif
                </div>
            </div>
            <div class="field">
                <label class="label">Telefoon</label>
                <div class="control @if($errors->count()) is-hidden @endif">
                    <p>{{ $user->telephone }}</p>
                </div>
                <div class="control has-icons-left profile-field @if(!$errors->count()) is-hidden @endif">
                    <span class="icon is-small is-left">
                        <i class="fas fa-phone"></i>
                    </span>
                    <input class="input" type="text" placeholder="{{ $user->telephone }}">
                    @if($errors->has('telephone'))
                        <p class="has-text-danger">{{ $errors->first('telephone') }}</p>
                    @endif
                </div>
            </div>
            <div class="field">
                <div class="file has-name @if(!$errors->count()) is-hidden @endif profile-field">
                    <label class="file-label">
                        <input class="file-input" type="file" name="profile-picture">
                        <span class="file-cta">
                            <span class="file-icon">
                                <i class="fas fa-upload"></i>
                            </span>
                            <span class="file-label">
                                Upload foto
                            </span>
                        </span>
                        <span class="file-name">
                        </span>
                    </label>
                    @if($errors->has('profile-picture'))
                        <p class="has-text-danger">{{ $errors->first('profile-picture') }}</p>
                    @endif
                </div>
            </div>
            <div class="columns">
                <div class="column is-6">
                    <div class="control">
                        <a id="toggle-edit-profile" class="button is-primary prevent-default @if($errors->count()) is-hidden @endif">Aanpassen</a>
                    </div>
                </div>
                <div class="column is-6">
                    <div class="control is-pulled-right">
                        <button class="button is-success @if(!$errors->count()) is-hidden @endif profile-field">Opslaan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
