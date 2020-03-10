<!--
TODO: archive workgroup function
------------------------->

@extends('layout.layout')
@section('title') {{ ucwords($workgroup->name) }} @endsection
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>{{ ucwords($workgroup->name) }}</h1>
</section>


@if(auth()->user()->inWorkgroup($workgroup->id) || auth()->user()->hasAppliedForWorkgroup($workgroup->id))
<form name="leave-workgroup-form" id="leave-workgroup-form" action="{{ route('leave-workgroup', ['workgroup_id' => $workgroup->id]) }}" method="POST">@csrf</form>
@else
<form name="join-workgroup-form" id="join-workgroup-form" action="{{ route('join-workgroup', ['workgroup_id' => $workgroup->id]) }}" method="POST">@csrf</form>
@endif


<!-- Main content -->
<section class="content">

	<div class="row">
		<div class="col-md-9">

            @boxes('Tabs', ['workgroup' => $workgroup])
			{{-- @include('boxes.tabs') --}}

			{{-- User is a member of this workgroup --}}
			@if(auth()->user()->inWorkgroup($workgroup->id))
			{{-- workgroup specific links --}}
			@if($workgroup->hasRole('aanname'))

            {{-- @include('boxes.applications') --}}
			@boxes('Applications')

            {{-- @include('boxes.veto') --}}
			@boxes('Veto')

			@endif

			@endif

			@boxes('FilesOverview', ['workgroup' => $workgroup])


		</div>
		<!-- /.col -->

		<div class="col-md-3">

			{{-- @include('boxes.workgroup-members') --}}
            @boxes('WorkgroupMembers', ['workgroup' => $workgroup])

			@if(auth()->user()->inWorkgroup($workgroup->id))

			{{-- @include('boxes.workgroup-new-members') --}}
            @boxes('workgroupNewMembers', ['workgroup' => $workgroup])

			@endif

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
