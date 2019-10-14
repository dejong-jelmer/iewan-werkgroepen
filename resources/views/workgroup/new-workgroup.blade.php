<!--
TODO: archive workgroup function
------------------------->

@extends('layout.layout')
@section('title') Nieuwe werkgroep @endsection
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>Nieuwe werkgroep</h1>
</section>


<!-- Main content -->
<section class="content">

	<div class="row margin-bottom">
		<div class="col-md-9">

			<label class="label sr-only">Naam</label>
			<div class="control">
				<input name="Naam" class="input form-control input-lg" type="text" placeholder="Naam voor de werkgroep">
			</div>


		</div>

		<!-- /.col -->


	</div>

	<div class="row">
		<div class="col-xs-12">
			<button class="btn btn-primary margin-top">Werkgroep aanmaken</button>

			<button class="btn btn-default margin-top text-muted"><i class="fa fa-close"></i> Annuleren</button>
		</div>
	</div>
	<!-- /.row -->

</section>
<!-- /.content -->

@endsection
