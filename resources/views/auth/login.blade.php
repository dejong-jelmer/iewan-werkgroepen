@extends('templates.layout')
@section('title') Login @endsection
@section('content')
            <form action="{{ route('login') }}" method="POST" style="margin-top: 150px">
                @csrf
                <div class="field">
                    <label for="email">Email:</label>
                    <div class="control">
                        <input name="email" type="email" class="input" id="email">
                    </div>
                </div>
                <div class="field">
                    <label for="pwd">Wachtwoord:</label>
                    <div class="control">
                        <input name="password" type="password" class="input" id="pwd">
                    </div>
                </div>
                <div class="field is-grouped is-grouped-right">
                    <div class="control">
                          <button type="submit" class="button is-primary">Login</button>
                    </div>
                </div>
            </form>

@endsection
