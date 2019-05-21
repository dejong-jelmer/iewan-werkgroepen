@extends('templates.layout')
@section('title') leden @endsection
@section('content')
<div class="colums first-element">
    <div class="column is-full">
        <div class="columns is-multiline">
            @forelse($users as $user)
                <div class="column is-4">
                    @include('workgroup.partials.user', [
                            'user' => $user
                        ])
                </div>
            @empty
                <p>De werkgroep heeft (nog) geen leden</p>
            @endforelse
        </div>
    </div>
</div>

@endsection
