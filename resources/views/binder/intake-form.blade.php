@extends('layout.layout')
@section('title') Inschrijfformulier @endsection
@section('content')

<section class="content-header">
	<h1>Iewan inschrijfformulier voor de klapper</h1>
</section>

@if(session()->has('success'))
<!-- hier kan eventueel nog meer info gegeven worden -->
@else

<section class="content">
	<div class="row">
		<div class="col-md-9">	

			@if($errors->count())
			<div class="notification is-danger">
				<ul class="is-danger">
					@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif

			<form action="{{ route('post-send-intake-form', ['key' => $form->key]) }}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="box box-primary">

					<div class="box-body">
						<div v-for="(field, item) in fields" class="form-group" v-if="field.type == 'text'">
							<label>@{{ field.name.replace('_', ' ') }} <small v-if="field.required == 1">&nbsp;*</small></label>
							<input :name="field.name" class="form-control" type="text">
						</div>
						<div v-else-if="field.type == 'textarea'" class="form-group">
							<label>@{{ field.name.replace('_', ' ') }}<small v-if="field.required == 1">&nbsp;*</small></label>
							<textarea :name="field.name" class="form-control"></textarea>
						</div>
						<div v-else-if="field.type == 'checkbox'" class="form-group">
								<label>@{{ field.name.replace('_', ' ') }}<small v-if="field.required == 1">&nbsp;*</small></label>
								<input :name="field.name" type="hidden" value="0" class="form-control">						<input onclick="$(this).prev().val(this.checked ? 1 : 0)" type="checkbox" class="form-control">
						</div>
						<div class="form-group">
							<label>Foto</label>
							<div class="file has-name @if($errors->has('intake_picture')) is-danger @else is-primary @endif">
								<label class="file-label">
									<input class="file-input" type="file" name="intake_picture">
									<span class="file-cta">
										<span class="file-icon">
											<i class="fas fa-upload"></i>
										</span>
										<span class="file-label">
											Upload foto
										</span>
									</span>
									<span class="file-name">
									</span>
								</label>
							</div>
							@if($errors->has('intake_picture'))
							<p class="has-text-danger control">{{ $errors->first('intake_picture') }}</p>
							@endif
						</div>
						<button class="button is-primary is-pulled-right">Versturen</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>

@endif
@endsection
@push('script-partials')
<script src="{{ mix('js/binderform.js') }}"></script>
@endpush
