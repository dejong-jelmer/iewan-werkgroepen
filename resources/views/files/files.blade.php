<!--
TODO: Bestanden route
------------------------->


@extends('templates.layout')
@section('title') Bestanden @endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Bestanden
	</h1>
</section>


<!-- Main content -->
<section class="content">

	<div class="row">

		<div class="col-md-12">

			@include('files.partials.files-overview')

		</div>
	</div>


</section>

<!-- /.content -->
<!-- /.content-wrapper -->

@endsection
