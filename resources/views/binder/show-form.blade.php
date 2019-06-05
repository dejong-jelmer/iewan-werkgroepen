@extends('templates.layout')
@section('title') Klapper formulier van {{ $form->name }} @endsection
@section('content')
    <div class="columns first-element">
        <div class="column is-full">
            <h5 class="title is-5 is-pulled-left">Klapper</h5>
            @if(auth()->user()->hasWorkgroupRole('aanname') && !$form->released)
                <a href="{{ route('release-form', ['form_id' => $form->id]) }}" class="button is-large is-danger is-outlined is-pulled-right">Formulier vrijgeven</a>
            @endif
        </div>
    </div>
    <div class="columns">
        <div class="column is-10 is-offset-1">
            <div class="field is-horizontal" v-for="(response, name, index) in responses">
                <div class="field-label is-normal">
                        {{-- @ToDo:string.replace vervangt maar één voorkomen van de unsderscore, een regex gebruiken om alle mogelijke underscores te verwijderen --}}
                    <label class="label">@{{ name.replace('_', ' ') }}:</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <p class="control">
                            <span v-if="fields[index].type == 'text' || fields[index].type == 'textarea'">
                                <input class="input is-static" type="text" :value="response" readonly>
                            </span>
                            <label v-if="fields[index].type == 'checkbox'" class="checkbox">
                                <input class="is-static" type="checkbox" :checked="checked[index].prop = (response == 1)" disabled>
                            </label>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('script-partials')
        <script src="{{ mix('js/binderform.js') }}"></script>
    @endpush
@endsection
