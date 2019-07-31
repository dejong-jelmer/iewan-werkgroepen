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

			<!-- About Me Box -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Menu / Acties</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">

					{{-- User is NOT a member of workgroup --}}
					@if(!auth()->user()->inWorkgroup($workgroup))
					<button class="btn btn-primary btn-block" href="#" onclick="$('#join-workgroup-form').submit();">Ga bij</button>
					<button class="btn btn-primary btn-block" href="#" data-target="message-form">Stuur bericht</button>
					@endif
					<button class="btn btn-primary btn-block" href="#">Bestanden</button>
					<button class="btn btn-primary btn-block" href="{{ route('workgroup-members',['workgroup_id' => $workgroup->id]) }}">Leden</button>


					{{-- User is a member of this workgroup --}}
					@if(auth()->user()->inWorkgroup($workgroup))
					{{-- workgroup specific links --}}
					@if($workgroup->role->role == 'Aanname')
					<button class="btn btn-primary btn-block" href="{{ route('workgroup-binder-form') }}">Klapper formulier</button>
					@endif
					<button class="btn btn-primary btn-block" href="#" onclick="$('#leave-workgroup-form').submit();">Verlaten</button>
					@endif

					<p>Ik weet niet of dit nog wel meerwaarde heeft.</p>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->

			<div class="box box-succes">
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
							<span class="users-list-date">Today</span>
						</li>
						<li>
							<img src="/AdminLTE/dist/img/user8-128x128.jpg" alt="User Image">
							<a class="users-list-name" href="#">Norman</a>
							<span class="users-list-date">Yesterday</span>
						</li>
						<li>
							<img src="/AdminLTE/dist/img/user7-128x128.jpg" alt="User Image">
							<a class="users-list-name" href="#">Jane</a>
							<span class="users-list-date">12 Jan</span>
						</li>
						<li>
							<img src="/AdminLTE/dist/img/user6-128x128.jpg" alt="User Image">
							<a class="users-list-name" href="#">John</a>
							<span class="users-list-date">12 Jan</span>
						</li>
						<li>
							<img src="/AdminLTE/dist/img/user2-160x160.jpg" alt="User Image">
							<a class="users-list-name" href="#">Alexander</a>
							<span class="users-list-date">13 Jan</span>
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
					<button class="btn btn-primary" href="#" onclick="alert('TODO')">Leden uitnodigen</button>
					<button class="btn btn-default" href="#" onclick="$('#leave-workgroup-form').submit();">Werkgroep verlaten</button>
					@endif
				</div>
				<!-- /.box-footer -->
			</div>







		</div>
		<!-- /.col -->
		<div class="col-md-9">

			<!-- Default box -->
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Informatie</h3>

					<div class="box-tools pull-right">

						<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
							<i class="fa fa-minus"></i></button>
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
			</div>
			<!-- /.box -->

			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Bestanden</h3>

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






@endsection
