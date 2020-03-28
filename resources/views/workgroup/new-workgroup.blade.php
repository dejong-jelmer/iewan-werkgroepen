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
		<div class="col-md-6 margin-bottom">

			<label class="label sr-only">Naam</label>
			<div class="control margin-bottom">
				<input name="Naam" class="input form-control input-lg" type="text" placeholder="Naam voor de werkgroep">
			</div>


			<button class="btn btn-primary margin-top">Werkgroep aanmaken</button>

		</div>

    </div>

<h4><i class="fa fa-archive"></i> Gearchiveerde werkgroep terughalen</h4>
	<div class="row margin-bottom">
		<div class="col-md-3">

			<label class="label sr-only">Gearchiveerde werkgroep</label>
			<div class="control">
			
			
			
				<select name="dearchive" class="input form-control">
				<option>Bouw</option>
				<option>Ontwerpteam</option>
				
                </select>
			</div>
        </div>
        		<div class="col-md-3">


			<button class="btn btn-default btn-sm margin-top"><i class="fa fa-refresh"></i> Werkgroep terughalen</button>

		</div>

    </div>


</section>
<!-- /.content -->

@endsection
