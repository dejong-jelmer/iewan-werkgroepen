@extends('templates.layout')
@section('title') Dashboard @endsection
@section('content')

   <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

               <div id="workgroups" class="columns is-multiline">
                @forelse(auth()->user()->workgroups as $workgroup)
                    <div class="column is-4">
                        @include('dashboard.partials.workgroup', [
                            'workgroup' => $workgroup
                        ])
                    </div>
                        @empty
                            <p>Je zit nog niet in een werkgroep</p>
                @endforelse
            </div>
            
            
    <div>
        {{-- <div class="column is-4 dashboard-card">
                @include('dashboard.partials.messages', [
                        'messages' => $messages
                    ])
        </div> --}}
        <div class="column is-4 dashboard-card">
                @include('dashboard.partials.forumposts', [
                        'forumPosts' => $forumPosts
                    ])
        </div>
        <div class="column is-4 dashboard-card">
                @include('dashboard.partials.binder_forms', [
                        'binderForms' => $binderForms
                    ])
        </div>
    </div>

    </section>
    <!-- /.content -->
@endsection
