@extends('templates.layout')
@section('title') Klapper @endsection
@section('content')


@section('title') leden @endsection
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

		<div class="col-md-3 pull-right">
			<button class="btn btn-primary btn-block margin-bottom toggle" data-target="email-form">Stuur een nieuw formulier</button>

			<div class="box box-solid">
				<div class="box-header with-border">
					<h3 class="box-title">In afwachting</h3>

				</div>
				<div class="box-body">
					<ul class="list-group">
						<li class="list-group-item"><strong>Thomas Mennen</strong><br>thomas@darkroast.nu <span class="text-muted pull-right">27 aug '19</span></li>
						<li class="list-group-item"><strong>Thomas Mennen</strong><br>thomas@darkroast.nu <span class="text-muted pull-right">27 aug '19</span></li>
						<li class="list-group-item"><strong>Thomas Mennen</strong><br>thomas@darkroast.nu <span class="text-muted pull-right">27 aug '19</span></li>
					</ul>

				</div>
				<!-- /.box-body -->
			</div>
			<!-- /. box -->

			<!-- /.box -->
		</div>
		<!-- /.col -->


		<div class="col-md-9">

			@include('binder.partials.email-form')

			@include('binder.partials.applications')

			@include('binder.partials.veto')

			@include('binder.partials.binder-list')

		</div>
	</div>


</section>


<!-- /.content -->
<!-- /.content-wrapper -->

@endsection
