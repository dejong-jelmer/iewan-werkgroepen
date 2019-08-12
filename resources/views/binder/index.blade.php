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
		<div class="col-xs-12">

			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Nieuwe klapper aanmeldingen</h3>

					<div class="box-tools">

					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body table-responsive no-padding">
					<table class="table table-hover">
						<tr>

							<th style="width: 200px">Aanmelding</th>
							<th>Naam</th>
							<th>Naam partner</th>
							<th>Woningvoorkeur (1)</th>
							<th>woningvoorkeur (2)</th>
							<th>Bekeken</th>

							<th style="width: 40px"></th>
							<th style="width: 40px"></th>
							<th style="width: 40px"></th>


						</tr>

						<tr>
							<td>2 aug '19</td>
							<td><a href="#">Thomas Mennen</a></td>
							<td>Ani Öhman</td>
							<td>Eenpersoons</td>
							<td>Gezinswoning</td>
							<td>0</td> <td style="width: 40px"><button class="btn btn-success" title="Accepteren"><i class="fa fa-check"></i><span class="sr-only">Accepteren</span></button></td>
							<td><button class="btn btn-default" title="Bewerken"><i class="fa fa-pencil"></i><span class="sr-only">Bewerken</span></button></td>
							<td><button class="btn btn-default" title="Verwijderen"><i class="fa fa-trash"></i><span class="sr-only">Verwijderen</span></button></td>
						</tr>





					</table>
				</div>
				<div class="box-footer clearfix">
					<div class="box-tools pull-right">

					</div>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->

			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Veto Periode</h3>

					<div class="box-tools">

					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body table-responsive no-padding">
					<table class="table table-hover">
						<tr>

							<th style="width: 100px">Aanmelding</th>
							<th style="width: 100px">Vetoperiode tot</th>
							<th>Naam</th>
							<th>Naam partner</th>
							<th>Woningvoorkeur (1)</th>
							<th>woningvoorkeur (2)</th>
							<th>Bekeken</th>
							<th style="width: 40px"></th>
							<th style="width: 40px"></th>
							<th style="width: 40px"></th>


						</tr>

						<tr>
							<td>2 aug '19</td>
							<td>12 aug '19</td>

							<td><a href="#">Thomas Mennen</a></td>
							<td>Ani Öhman</td>
							<td>Eenpersoons</td>
							<td>Gezinswoning</td>
							<td>12</td>
							<td style="width: 40px"><button class="btn btn-success" title="Accepteren"><i class="fa fa-check"></i><span class="sr-only">Accepteren</span></button></td>
							<td><button class="btn btn-default" title="Bewerken"><i class="fa fa-pencil"></i><span class="sr-only">Bewerken</span></button></td>
							<td><button class="btn btn-default" title="Verwijderen"><i class="fa fa-trash"></i><span class="sr-only">Verwijderen</span></button></td>
						</tr>





					</table>
				</div>
				<div class="box-footer clearfix">
					<div class="box-tools pull-right">

					</div>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Klapper</h3>

					<div class="box-tools">
						<div class="input-group input-group-sm hidden-xs" style="width: 150px;">
							<input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

							<div class="input-group-btn">
								<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
							</div>
						</div>
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body table-responsive no-padding">
					<table class="table table-hover">
						<tr>

							<th style="width: 200px">Aanmelding</th>
							<th>Naam</th>
							<th>Naam partner</th>
							<th>Woningvoorkeur (1)</th>
							<th>woningvoorkeur (2)</th>
							<th>Bekeken</th>
							<th style="width: 40px"></th>
							<th style="width: 40px"></th>
							<th style="width: 40px"></th>


						</tr>

						<tr>
							<td>2 aug '19</td>
							<td><a href="#">Thomas Mennen</a></td>
							<td>Ani Öhman</td>
							<td>Eenpersoons</td>
							<td>Gezinswoning</td>
							<td>12</td>
							<td style="width: 40px"><button class="btn btn-success" title="Accepteren"><i class="fa fa-check"></i><span class="sr-only">Accepteren</span></button></td>

							<td><button class="btn btn-default" title="Bewerken"><i class="fa fa-pencil"></i><span class="sr-only">Bewerken</span></button></td>
							<td><button class="btn btn-default" title="Verwijderen"><i class="fa fa-trash"></i><span class="sr-only">Verwijderen</span></button></td>
						</tr>

						<tr>
							<td>2 aug '19</td>
							<td><a href="#">Thomas Mennen</a></td>
							<td>Ani Öhman</td>
							<td>Eenpersoons</td>
							<td>Gezinswoning</td>
							<td>12</td>
							<td style="width: 40px"><button class="btn btn-success" title="Accepteren"><i class="fa fa-check"></i><span class="sr-only">Accepteren</span></button></td>

							<td><button class="btn btn-default" title="Bewerken"><i class="fa fa-pencil"></i><span class="sr-only">Bewerken</span></button></td>
							<td><button class="btn btn-default" title="Verwijderen"><i class="fa fa-trash"></i><span class="sr-only">Verwijderen</span></button></td>
						</tr>

						<tr>
							<td>2 aug '19</td>
							<td><a href="#">Thomas Mennen</a></td>
							<td>Ani Öhman</td>
							<td>Eenpersoons</td>
							<td>Gezinswoning</td>
							<td>12</td>
							<td style="width: 40px"><button class="btn btn-success" title="Accepteren"><i class="fa fa-check"></i><span class="sr-only">Accepteren</span></button></td>

							<td><button class="btn btn-default" title="Bewerken"><i class="fa fa-pencil"></i><span class="sr-only">Bewerken</span></button></td>
							<td><button class="btn btn-default" title="Verwijderen"><i class="fa fa-trash"></i><span class="sr-only">Verwijderen</span></button></td>
						</tr>

						<tr>
							<td>2 aug '19</td>
							<td><a href="#">Thomas Mennen</a></td>
							<td>Ani Öhman</td>
							<td>Eenpersoons</td>
							<td>Gezinswoning</td>
							<td>12</td>
							<td style="width: 40px"><button class="btn btn-success" title="Accepteren"><i class="fa fa-check"></i><span class="sr-only">Accepteren</span></button></td>

							<td><button class="btn btn-default" title="Bewerken"><i class="fa fa-pencil"></i><span class="sr-only">Bewerken</span></button></td>
							<td><button class="btn btn-default" title="Verwijderen"><i class="fa fa-trash"></i><span class="sr-only">Verwijderen</span></button></td>
						</tr>
						<tr>
							<td>2 aug '19</td>
							<td><a href="#">Thomas Mennen</a></td>
							<td>Ani Öhman</td>
							<td>Eenpersoons</td>
							<td>Gezinswoning</td>
							<td>12</td>
							<td style="width: 40px"><button class="btn btn-success" title="Accepteren"><i class="fa fa-check"></i><span class="sr-only">Accepteren</span></button></td>

							<td><button class="btn btn-default" title="Bewerken"><i class="fa fa-pencil"></i><span class="sr-only">Bewerken</span></button></td>
							<td><button class="btn btn-default" title="Verwijderen"><i class="fa fa-trash"></i><span class="sr-only">Verwijderen</span></button></td>
						</tr>

						<tr>
							<td>2 aug '19</td>
							<td><a href="#">Thomas Mennen</a></td>
							<td>Ani Öhman</td>
							<td>Eenpersoons</td>
							<td>Gezinswoning</td>
							<td>12</td>
							<td style="width: 40px"><button class="btn btn-success" title="Accepteren"><i class="fa fa-check"></i><span class="sr-only">Accepteren</span></button></td>

							<td><button class="btn btn-default" title="Bewerken"><i class="fa fa-pencil"></i><span class="sr-only">Bewerken</span></button></td>
							<td><button class="btn btn-default" title="Verwijderen"><i class="fa fa-trash"></i><span class="sr-only">Verwijderen</span></button></td>
						</tr>

						<tr>
							<td>2 aug '19</td>
							<td><a href="#">Thomas Mennen</a></td>
							<td>Ani Öhman</td>
							<td>Eenpersoons</td>
							<td>Gezinswoning</td>
							<td>12</td>
							<td style="width: 40px"><button class="btn btn-success" title="Accepteren"><i class="fa fa-check"></i><span class="sr-only">Accepteren</span></button></td>

							<td><button class="btn btn-default" title="Bewerken"><i class="fa fa-pencil"></i><span class="sr-only">Bewerken</span></button></td>
							<td><button class="btn btn-default" title="Verwijderen"><i class="fa fa-trash"></i><span class="sr-only">Verwijderen</span></button></td>
						</tr>

						<tr>
							<td>2 aug '19</td>
							<td><a href="#">Thomas Mennen</a></td>
							<td>Ani Öhman</td>
							<td>Eenpersoons</td>
							<td>Gezinswoning</td>
							<td>12</td>
							<td style="width: 40px"><button class="btn btn-success" title="Accepteren"><i class="fa fa-check"></i><span class="sr-only">Accepteren</span></button></td>

							<td><button class="btn btn-default" title="Bewerken"><i class="fa fa-pencil"></i><span class="sr-only">Bewerken</span></button></td>
							<td><button class="btn btn-default" title="Verwijderen"><i class="fa fa-trash"></i><span class="sr-only">Verwijderen</span></button></td>
						</tr>

						<tr>
							<td>2 aug '19</td>
							<td><a href="#">Thomas Mennen</a></td>
							<td>Ani Öhman</td>
							<td>Eenpersoons</td>
							<td>Gezinswoning</td>
							<td>12</td>
							<td><button class="btn btn-default" title="Bewerken"><i class="fa fa-pencil"></i><span class="sr-only">Bewerken</span></button></td>
							<td><button class="btn btn-default" title="Verwijderen"><i class="fa fa-trash"></i><span class="sr-only">Verwijderen</span></button></td>
						</tr>



					</table>
				</div>
				<div class="box-footer clearfix">
					<div class="box-tools pull-right">
						<div class="input-group input-group-sm hidden-xs" style="width: 150px;">
							<input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

							<div class="input-group-btn">
								<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
							</div>
						</div>
					</div>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
	</div>


</section>

@forelse($binderForms as $form)
<a href="{{ route('binder-form', ['form_id' => $form->id]) }}">{{ $form->name }}</a>
@empty
<p>Geen (nieuwe) klapper formulieren</p>
@endforelse


<!-- /.content -->
<!-- /.content-wrapper -->

@endsection