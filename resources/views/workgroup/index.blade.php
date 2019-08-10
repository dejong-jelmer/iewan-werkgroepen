@extends('templates.layout')
@section('title') {{ $workgroup->name }} @endsection
@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>{{ $workgroup->name }}</h1>
	@include('user.partials.send-message',[
	'workgroup' => $workgroup,
	'at' => 'workgroup',
	'route' => route('send-workgroup-message', [
	'workgroup_id' => $workgroup->id,
	]),
	'hidden' => true
	])

</section>

@if(!auth()->user()->inWorkgroup($workgroup))
<form name="join-workgroup-form" id="join-workgroup-form" action="{{ route('join-workgroup', ['workgroup_id' => $workgroup->id]) }}" method="POST">@csrf</form>
@else
<form name="leave-workgroup-form" id="leave-workgroup-form" action="{{ route('leave-workgroup', ['workgroup_id' => $workgroup->id]) }}" method="POST">@csrf</form>
@endif


<!-- Main content -->
<section class="content">

	<div class="row">
		<div class="col-md-3">

			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Werkgroep Leden</h3>

					<div class="box-tools pull-right">

						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

					</div>
				</div>
				<!-- /.box-header -->



				<div class="box-body no-padding">
					<ul class="users-list clearfix">
						<li>
							<img src="/AdminLTE/dist/img/user1-128x128.jpg" alt="User Image">
							<a class="users-list-name" href="#">Alexander Pierce</a>
						</li>
						<li>
							<img src="/AdminLTE/dist/img/user8-128x128.jpg" alt="User Image">
							<a class="users-list-name" href="#">Norman</a>
						</li>
						<li>
							<img src="/AdminLTE/dist/img/user7-128x128.jpg" alt="User Image">
							<a class="users-list-name" href="#">Jane</a>
						</li>
						<li>
							<img src="/AdminLTE/dist/img/user6-128x128.jpg" alt="User Image">
							<a class="users-list-name" href="#">John</a>
						</li>
						<li>
							<img src="/AdminLTE/dist/img/user2-160x160.jpg" alt="User Image">
							<a class="users-list-name" href="#">Alexander</a>
						</li>
					</ul>
					<!-- /.users-list -->
				</div>
				<!-- /.box-body -->
				<div class="box-footer text-center">
					@if(!auth()->user()->inWorkgroup($workgroup))
					<button class="btn btn-primary" href="#" onclick="$('#join-workgroup-form').submit();">Ga bij deze werkgroep</button>
					@endif
					@if(auth()->user()->inWorkgroup($workgroup))
					<button class="btn btn-default" href="#" onclick="$('#leave-workgroup-form').submit();">Werkgroep verlaten</button>
					@endif
				</div>
				<!-- /.box-footer -->
			</div>

			<!-- TODO: Accept/ Decline functie instellen -->
			@if(auth()->user()->inWorkgroup($workgroup))

			<div class="box box-primary box-solid">
				<div class="box-header with-border">
					<h3 class="box-title">Nieuwe werkgroepleden</h3>

					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i><span class="sr-only">Sluiten</span></button>

					</div>
				</div>
				<!-- /.box-header -->

				<div class="box-body no-padding">
					<table class="table">

						<tr>

							<td style="width: 10px">1</td>
							<td style="width: 50px"><img src="https://i.pravatar.cc/48?u=1" alt="User Avatar"></td>
							<td><a href="#">Jelmer</a></td>
							<td style="width: 40px"><button class="btn btn-success" title="Accepteren"><i class="fa fa-check"></i><span class="sr-only">Accepteren</span></button></td>
							<td style="width: 40px"><button class="btn btn-danger" title="Weigeren"><i class="fa fa-ban"></i><span class="sr-only">Weigeren</span></button></td>

						</tr>

						<tr>

							<td>2</td>
							<td><img src="https://i.pravatar.cc/48?u=2" alt="User Avatar"></td>
							<td><a href="#">Wen</a></td>
							<td style="width: 40px"><button class="btn btn-success" title="Accepteren"><i class="fa fa-check"></i><span class="sr-only">Accepteren</span></button></td>
							<td style="width: 40px"><button class="btn btn-danger" title="Weigeren"><i class="fa fa-ban"></i><span class="sr-only">Weigeren</span></button></td>

						</tr>
					</table>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->

			@endif




		</div>
		<!-- /.col -->
		<div class="col-md-9">



			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#activity" data-toggle="tab">Informatie</a></li>
					<li><a href="#timeline" data-toggle="tab">Activiteiten</a></li>
				</ul>
				<div class="tab-content">
					<div class="active tab-pane" id="activity">

						<!-- Default box -->

						<div class="box-header">
							<h3 class="box-title">Informatie</h3>

							<div class="box-tools pull-right">

							</div>
						</div>
						<div class="box-body">
							Hier komt werkgroep tekst
						</div>
						<!-- /.box-body -->
						<div class="box-footer">
							<div class="box-tools pull-right">
								@if(auth()->user()->inWorkgroup($workgroup))
								<button type="button" class="btn btn-box-tool" data-widget="editor"><i class="fa fa-pencil"></i>
								</button>

								{{-- <div id="text-editor">
<textarea name="body" class="textarea editor"></textarea>
</div> --}}
								@endif
							</div>
						</div>
						<!-- /.box-footer-->
						<!-- /.box -->


					</div>
					<!-- /.tab-pane -->
					<div class="tab-pane" id="timeline">

						<!-- Default box -->
						<div class="box-header">
							<h3 class="box-title">Activiteiten</h3>

							<div class="box-tools pull-right">


							</div>
						</div>
						<div class="box-body">
							Hier komt werkgroep tekst
						</div>
						<!-- /.box-body -->
						<div class="box-footer">
							<div class="box-tools pull-right">
								@if(auth()->user()->inWorkgroup($workgroup))
								<button type="button" class="btn btn-box-tool" data-widget="editor"><i class="fa fa-pencil"></i>
								</button>

								{{-- <div id="text-editor">
<textarea name="body" class="textarea editor"></textarea>
</div> --}}
								@endif
							</div>
						</div>
						<!-- /.box-footer-->
						<!-- /.box -->


					</div>
					<!-- /.tab-pane -->


				</div>
				<!-- /.tab-content -->
			</div>
			<!-- /.nav-tabs-custom -->



<div class="box">
				<div class="box-header">
					<h3 class="box-title">Bestanden</h3>

					<div class="box-tools">
						<div class="row">
							<!-- select -->
							<div class="form-group form-group-sm hidden-xs col-xs-6">
								<label class="sr-only">soort document</label>
								<select class="form-control">
									<option>Filter documenten</option>
									<option>Notulen</option>
									<option>Verslagen</option>
									<option>Voorstellen</option>
									<option>Handleidingen</option>
									<option>Overigen</option>
								</select>
							</div>

							<div class="input-group input-group-sm hidden-xs col-xs-5">
								<input type="text" name="table_search" class="form-control" placeholder="Search">

								<div class="input-group-btn">
									<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body table-responsive no-padding">
					<table class="table table-hover">
						<!--
<tr>
<th>type</th>
<th>Naam</th>
<th>Grootte</th>
<th>Datum</th>
</tr>
-->
						<tr>
							<td><i class="fa fa-file-pdf-o"></i></td>
							<td><a href=#>Presentatie voorstel winst DKW.pdf</a></td>
							<td><span class="label label-default">Voorstel</span></td>
							<td>240 kB</td>
							<td>20-05-2019 14:47</td>
						</tr>

						<tr>
							<td><i class="fa fa-file-word-o"></i></td>
							<td><a href=#>Voorstel inbraakpreventie schuurtjes.docx </a></td>
							<td><span class="label label-default">Voorstel</span></td>
							<td>16 kB</td>
							<td>19-05-2019 12:10</td>
						</tr>

						<tr>
							<td><i class="fa fa-file-pdf-o"></i></td>
							<td><a href=#>2019-03-19 Notulen Technische Dienst 19-03-2019.pdf</a></td>
							<td><span class="label label-default">Notulen</span></td>
							<td> 38 kB</td>
							<td>20-03-2019 10:18</td>
						</tr>

						<tr>
							<td><i class="fa fa-file-image-o"></i></td>
							<td><a href=#>vrachtwagen met stro.jpg </a></td>
							<td><span class="label label-default">Overigen</span></td>
							<td>94 kB</td>
							<td>27-03-2013 13:3</td>
						</tr>

						<tr>
							<td><i class="fa fa-file-powerpoint-o"></i></td>
							<td><a href=#> casus3 ALV2018 kippen.ppt</a></td>
							<td><span class="label label-default">Casus</span></td>
							<td>406 kB</td>
							<td>12-04-2012 00:45</td>
						</tr>

					</table>
				</div>
				<!-- /.box-body -->

				<div class="box-footer clearfix">
					<div class="file-upload pull-left">
						<button class="btn btn-primary" href="#" onclick="alert('TODO')">Bestand uploaden</button>

					</div>
					<ul class="pagination pagination-sm no-margin pull-right">
						<li><a href="#">&laquo;</a></li>
						<li><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">&raquo;</a></li>
					</ul>
				</div>
			</div>
			<!-- /.box -->

		</div>
		<!-- /.col -->
	</div>

	<div class="row">
		<div class="col-xs-12">

		</div>
	</div>
	<!-- /.row -->

</section>
<!-- /.content -->
<!-- /.content -->

@endsection


@section('script')
<script>
	$(function() {
		//Initialize Select2 Elements
		//	$('.select2').select2()
	});

</script>
@endsection
