@extends('templates.layout')
@section('title') @isset($user) {{ $user->name }} @endisset @endsection
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>{{ ucfirst($user->name) }}</h1>

</section>
<!-- / Conten Header -->

<!-- Main content -->
<section class="content">

	<div class="row">
		<div class="col-md-4">

			<div class="box">

				<div class="box-body">
					<img src="{{ !empty($user->photo) ? Storage::url($user->photo) : asset('img/empty-avatar.jpg') }}" alt="Profielfoto" class="w-100" width="100%">
				</div>
				<!-- /.box-body -->

			</div>

		</div>
		<!-- /.col -->
		<div class="col-md-3">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Contact</h3>

					<div class="box-tools pull-right">

					</div>
				</div>
				<!-- /.box-header -->

				<div class="box-body">
					<ul class="list-group list-group-unbordered">
						<li class="list-group-item">
							<b>Email</b> <a href="mailto:{{ ucfirst($user->email) }}" class="pull-right">{{ ucfirst($user->email) }}</a>
						</li>
						<li class="list-group-item">
							<b>Telefoon</b> <a href="tel:{{ ucfirst($user->telephone) }}" class="pull-right">{{ ucfirst($user->telephone) }}</a>
						</li>



					</ul>
				</div>
				<!-- /.box-body -->
				<div class="box-footer text-center">

				</div>
				<!-- /.box-footer -->
			</div>

			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Werkgroepen</h3>

					<div class="box-tools pull-right">


					</div>
				</div>
				<!-- /.box-header -->

				<div class="box-body">

					@forelse($user->workgroups as $workgroup)
					<a href="{{ route('workgroup', ['workgroup_id' => $workgroup->id]) }}" class="label label-default">{{ $workgroup->name }}</a>
					@empty
					<span>{{$user->name}} zit nog niet in een werkgroep</span>
					@endforelse
				</div>
				<!-- /.box-body -->
				<div class="box-footer text-center">

				</div>
				<!-- /.box-footer -->
			</div>
		</div>



	</div>

	<div class="row">
		<div class="col-md-7">

			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Over mij</h3>

					<div class="box-tools pull-right">

					</div>
				</div>
				<!-- /.box-header -->

				<div class="box-body">
					<p>Een bio of iets leuks?</p>
				</div>
				<!-- /.box-body -->
				<div class="box-footer text-center">

				</div>
				<!-- /.box-footer -->
			</div>




		</div>




	</div>
</section>



@endsection
