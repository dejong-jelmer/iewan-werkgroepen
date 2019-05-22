@extends('templates.layout')
@section('title') Klapper @endsection
@section('content')
    <div class="columns first-element">
        <div class="column is-full">
            <h5 class="title is-5">Klapper</h5>
            @forelse($binderForms as $form)
                <a href="{{ route('binder-form', ['form_id' => $form->id]) }}">{{ $form->name }}</a>
            @empty
            @endforelse
        </div>
    </div>
@endsection
