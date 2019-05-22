@extends('templates.layout')
@section('title') Klapper formulier van {{ $form->name }} @endsection
@section('content')
    <div class="columns first-element">
        <div class="column is-full">
            <h5 class="title is-5">Klapper</h5>
            {{ $form->fields }}
        </div>
    </div>
    @push('script-partials')
        <script>
            var fields = {!! $form->fields !!};
        </script>
    @endpush
@endsection
