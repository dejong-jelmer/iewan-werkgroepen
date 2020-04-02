@extends('layout.layout')
@section('title') Klapper formulier van {{ $form->name }} @endsection
@section('content')



<section class="content-header clearfix">
	<h1 class="pull-left">Klapperformulier</h1>
	<div class="no-padding pull-right">
	    			<a class="btn btn-default clearfix" href="{{ route('binder') }}">Terug naar het klapperoverzicht</a>

	</div>
</section>

<section class="content">

	<div class="row">
		<div class="col-md-3">

			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Contact</h3>
					<div class="box-tools pull-right">
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<ul class="list-group  non-edit-user">
						<li class="list-group-item">


							<b>Naam</b> <span class="pull-right">{{ $form->name }}</span>
						</li>

						@if(auth()->user()->hasWorkgroupRole('aanname'))

						<li class="list-group-item">
							<b>Email</b> <a href="mailto:" class="pull-right">{{ $form->email }}</a>
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


							<b>Ingeschreven sinds</b> <span class="pull-right">{{ $form->filled_in }}</span>
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

					<ul class="list-group list-group-unbordered  non-edit-user">
						<li class="list-group-item" v-for="(response, name, index) in responses">
							<div v-if="fields[index].type == 'text' || fields[index].type == 'textarea'">
								<b>@{{ print(name) }}:</b><br>@{{ print(response) }}
							</div>

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
		<div class="col-md-3 pull-right margin-bottom">
            
     		<div class="box">
				<div class="box-body form-group">

					<img id="profile-image" src="{{ !empty($user->avatar) ? Storage::url($user->avatar) : asset('img/empty-profile.jpg') }}" alt="Profielfoto" class="w-100" width="100%">
				</div>

			</div>
			<div class="pull-right">
			        			@if(auth()->user()->hasWorkgroupRole('aanname')) 

@if(!$form->released)
			<a href="{{ route('release-form', ['form_id' => $form->id]) }}" class="btn btn-success btn-lg margin-bottom" title="Accepteren"><i class="fa fa-check"></i> Formulier vrijgeven</a>
            @endif

            <button class="btn btn-default btn-lg margin-bottom" title="Bewerk"><i class="fa fa-edit"></i></button>

            <button class="btn btn-default btn-lg margin-bottom" title="Verwijderen"><i class="fa fa-trash"></i></button>

			@endif  
            </div>
		</div>
	</div>
</section>



@push('script-partials')
<script src="{{ mix('js/binderform.js') }}"></script>
@endpush
@endsection
