@extends('layout.layout')
@section('title') Klapper formulier van {{ $form->name }} @endsection
@section('content')



<section class="content-header">
	<h1>Klapperformulier</h1>
</section>

<section class="content">

	<div class="row">
		<div class="col-md-3 pull-right">

			@if(auth()->user()->hasWorkgroupRole('aanname') && !$form->released)
			<a href="{{ route('release-form', ['form_id' => $form->id]) }}" class="btn btn-success btn-lg btn-block margin-bottom" title="Accepteren"><i class="fa fa-check"></i> Formulier vrijgeven</a>

			@endif


			<div class="box">
				<div class="box-body form-group">

					<img id="profile-image" src="{{ !empty($user->avatar) ? Storage::url($user->avatar) : asset('img/empty-profile.jpg') }}" alt="Profielfoto" class="w-100" width="100%">
				</div>

			</div>
		</div>

		<div class="col-md-3">

			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Contact</h3>
					<div class="box-tools pull-right">
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<ul class="list-group list-group-unbordered non-edit-user">
						<li class="list-group-item">


							<b>Naam</b> <span class="pull-right">Thomas Mennen</span>
						</li>

						@if(auth()->user()->hasWorkgroupRole('aanname'))

						<li class="list-group-item">
							<b>Email</b> <a href="mailto:" class="pull-right">thomas@test.com</a>
						</li>

						@endif

						<li class="list-group-item">


							<b>Naam partner</b> <span class="pull-right">Ani Öhman</span>
						</li>

						<li class="list-group-item">


							<b>Wooningvoorkeur (1)</b> <span class="pull-right">Eenpersoons</span>
						</li>

						<li class="list-group-item">


							<b>Woningvoorkeur (2)</b> <span class="pull-right">Gezinswoning</span>
						</li>

						<li class="list-group-item">


							<b>Ingeschreven sinds</b> <span class="pull-right">1 mei 2015</span>
						</li>



					</ul>
				</div>
				<!-- /.box-body -->
				<div class="box-footer text-center">

				</div>
				<!-- /.box-footer -->
			</div>

		</div>


		<div class="col-md-6">

			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Antwoorden</h3>
				</div>
				<!-- /.box-header -->

				<div class="box-body">

					<ul class="list-group list-group-unbordered non-edit-user">
						<li class="list-group-item" v-for="(response, name, index) in responses">
							<div v-if="fields[index].type == 'text' || fields[index].type == 'textarea'">
								<b>@{{ print(name) }}:</b><br>@{{ print(response) }}
							</div>
						</li>

						<li class="list-group-item" v-for="(response, name, index) in responses">
							<div v-if="fields[index].type == 'checkbox'">
								<b>@{{ print(name) }}:</b><br>@{{ print(response) }}
							</div>
						</li>

					</ul>

				</div>
				<!-- /.box-body -->
				<div class="box-footer text-center">

				</div>
				<!-- /.box-footer -->
			</div>




		</div>

	</div>
</section>



@push('script-partials')
<script src="{{ mix('js/binderform.js') }}"></script>
@endpush
@endsection
