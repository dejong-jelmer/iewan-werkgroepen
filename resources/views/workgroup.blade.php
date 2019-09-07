<!--
TODO: archive workgroup function
------------------------->

@extends('layout.layout')
@section('title') {{ $workgroup->name }} @endsection
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>{{ $workgroup->name }}</h1>
</section>


<!-- TODO: Staat dit hier goed? -->
@if(!auth()->user()->inWorkgroup($workgroup->id))
<form name="join-workgroup-form" id="join-workgroup-form" action="{{ route('join-workgroup', ['workgroup_id' => $workgroup->id]) }}" method="POST">@csrf</form>
@else
<form name="leave-workgroup-form" id="leave-workgroup-form" action="{{ route('leave-workgroup', ['workgroup_id' => $workgroup->id]) }}" method="POST">@csrf</form>
@endif


<!-- Main content -->
<section class="content">

	<div class="row">
		<div class="col-md-3">

			@include('workgroup.partials.members')

			@if(auth()->user()->inWorkgroup($workgroup->id))

			@include('workgroup.partials.new-members')

			@endif

		</div>
		<!-- /.col -->

		<div class="col-md-9">

			@include('workgroup.partials.tabs')

			{{-- User is a member of this workgroup --}}
			@if(auth()->user()->inWorkgroup($workgroup->id))
			{{-- workgroup specific links --}}
			@if($workgroup->role->role == 'Aanname')

			@include('boxes.applications')

			@include('boxes.veto')

			@endif

			@endif

			@include('boxes.files-overview')


		</div>
		<!-- /.col -->
	</div>

	<div class="row">
		<div class="col-xs-12">
			<button class="btn btn-default btn-sm margin-top text-muted pull-right"><i class="fa fa-archive"></i> Werkgroep archiveren</button>
		</div>
	</div>
	<!-- /.row -->

</section>
<!-- /.content -->

@endsection
