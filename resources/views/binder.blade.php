@extends('layout.layout')
@section('title') Klapper @endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Klapper
	</h1>
</section>


<!-- Main content -->
<section class="content">

	<div class="row">

		@if(auth()->user()->hasWorkgroupRole('aanname'))

		<div class="col-md-3 pull-right">
			<button class="btn btn-primary btn-block margin-bottom toggle" data-target="email-form">Stuur een nieuw formulier</button>

			<div class="box box-solid">
				<div class="box-header with-border">
					<h3 class="box-title">In afwachting</h3>

				</div>
				<div class="box-body">
					<ul class="list-group">
						@foreach($pending as $p)
						<li class="list-group-item"><strong>{{ $p->name }}</strong> <span class="text-muted pull-right">{{ $p->created_at->locale('nl')->isoFormat('D MMM YY') }}</span></li>
						@endforeach
					</ul>

				</div>
				<!-- /.box-body -->
			</div>
			<!-- /. box -->

			<!-- /.box -->
		</div>
		<!-- /.col -->

		<div class="col-md-9">

			@include('boxes.email-form')

			@include('boxes.applications')

			@else

			<div class="col-md-12">

				@endif

				@include('boxes.veto')

				@include('boxes.binder-list')

			</div>


</section>


<!-- /.content -->
<!-- /.content-wrapper -->

@endsection
