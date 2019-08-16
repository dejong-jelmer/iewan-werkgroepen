@extends('templates.layout')
@section('title') Dashboard @endsection
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Dashboard
		<small>Optional description</small>
	</h1>

</section>

<!-- Main content -->

<section class="content">

	<div class="row">
		<div class="col-md-8">
			@include('dashboard.partials.forumposts', [
			'forumPosts' => $forumPosts
			])

			@include('dashboard.partials.binder_forms', [
			'binderForms' => $binderForms
			])

			<div class="box">
                
				<div class="box-header">
					<h3 class="box-title">Recent geuploade bestanden</h3>


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

				</div>
			</div>
			<!-- /.box -->



		</div>
		<div class="col-md-4">
		</div>
	</div>

</section>
<!-- /.content -->
@endsection
