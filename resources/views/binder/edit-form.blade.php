@extends('layout.layout')
@section('title') Klapperformulier bewerken @endsection
@section('content')
    <div class="columns first-element">
        <div class="column is-full">
            <h5 class="title is-5">Klapperformulier bewerken</h5>
        </div>
    </div>
    <div class="columns">
        @if($errors->any())
            {{ var_dump($errors->all()) }}
        @endif
        <div class="column is-10 is-offset-1">
            <form class="form" action="{{ route('post-edit-binder-form') }}" method="POST">
                @csrf
                @foreach($fields as $field)
                    <div class="columns binderform_fields_row">
                        <div class="column is-full">
                            <div class="field is-horizontal">
                                <div class="field-label is-normal">
                                    <label class="label">Naam van veld</label>
                                </div>
                                <div class="field-body">
                                    <div class="field">
                                        <p class="control">
                                            <input name="name_field[]" class="input" type="text" value="{{ $field['name'] }}">
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="field is-horizontal">
                                <div class="field-label is-normal">
                                    <label class="label">Veld type</label>
                                </div>
                                 <div class="field-body">
                                    <div class="field">
                                        <p class="control">
                                            <div class="select">
                                                <select name="type_field[]">
                                                    <option value="checkbox" @if($field['type'] == 'checkbox') selected @endif>checkbox</option>
                                                    <option value="text" @if($field['type'] == 'text') selected @endif>tekst</option>
                                                    <option value="textarea" @if($field['type'] == 'textarea') selected @endif>tekstveld</option>
                                                </select>
                                            </div>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="field is-horizontal">
                                <div class="field-label is-normal">
                                    <label class="label">Vereist</label>
                                </div>
                                <div class="field-body">
                                    <div class="field">
                                        <p class="control">
                                            <label class="checkbox">
                                                <input name="required_field[]" type="hidden" value="{{ $field['required'] }}">
                                                <input onclick="$(this).prev().val(this.checked ? 1 : 0)" type="checkbox" @if($field['required']) checked @endif>
                                            </label>
                                            <a class="button is-danger is-pulled-right remove_binderform_field"><i class="fas fa-times"></i></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </form>
        </div>
    </div>
    <div class="columns">
        <div class="column is-10 is-offset-1">
            <a id="add_binderform_field" title="Veld toevoegen" class="button is-success is-pulled-left"><i class="fas fa-plus"></i></a>
            <button onclick="$('.form').submit();" class="button is-primary is-pulled-right">Opslaan</button>
        </div>
    </div>
@endsection
