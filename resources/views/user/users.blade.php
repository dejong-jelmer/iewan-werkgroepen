@extends('templates.layout')
@section('title') leden @endsection
@section('content')

<section class="content-header">
	<h1> Bewoners </h1>
</section>


<!-- Main content -->
<section class="content">

	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Bewoners</h3>

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

							<th>Foto</th>
							<th>Naam</th>
							<th>Email</th>
							<th>Werkgroepen</th>
						</tr>


						@forelse($users as $user)
						<tr>

							@include('user.partials.user', [
							'user' => $user
							])
						</tr>
						<!-- /.row -->
						@empty
						<p>Er woont helemaal niemand bij Iewan</p>
						@endforelse

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


<!-- /.content -->
<!-- /.content-wrapper -->

@endsection
