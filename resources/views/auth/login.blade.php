@extends('templates.layout')
@section('title') Login @endsection
@section('content')
    <div class="row">
        <div class="col-10 offset-1 col-md-4 offset-md-4">
            <form action="{{ route('login') }}" method="POST" style="margin-top: 150px">
                @csrf
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input name="email" type="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <label for="pwd">Wachtwoord:</label>
                    <input name="password" type="password" class="form-control" id="pwd">
                </div>
                <div class="form-group form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox"> Onthouden
                    </label>
                  </div>
                  <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
@endsection
