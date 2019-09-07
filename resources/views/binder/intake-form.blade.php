@extends('layout.layout')
@section('title') Inschrijfformulier @endsection
@section('content')
@if(session()->has('success'))
<p>Bedankt voor je aanmelding</p>
@else
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
	<div class="columns first-element">
		<div class="column is-full">
			<div v-for="(field, item) in fields" class="field is-horizontal" v-if="field.type == 'text'">
				<div class="field-label is-normal">
					<label class="label">@{{ field.name.replace('_', ' ') }} <small v-if="field.required == 1">&nbsp;*</small></label>
				</div>
				<div class="field-body">
					<div class="field">
						<p class="control">
							<input :name="field.name" class="input" type="text">
						</p>
					</div>
				</div>
			</div>
			<div v-else-if="field.type == 'textarea'" class="field is-horizontal">
				<div class="field-label is-normal">
					<label class="label">@{{ field.name.replace('_', ' ') }}<small v-if="field.required == 1">&nbsp;*</small></label>
				</div>
				<div class="field-body">
					<div class="field">
						<p class="control">
							<textarea :name="field.name" class="textarea"></textarea>
						</p>
					</div>
				</div>
			</div>
			<div v-else-if="field.type == 'checkbox'" class="field is-horizontal">
				<div class="field-label is-normal">
					<label class="label">@{{ field.name.replace('_', ' ') }}<small v-if="field.required == 1">&nbsp;*</small></label>
				</div>
				<div class="field-body">
					<div class="field">
						<p class="control">
							<input :name="field.name" type="hidden" value="0">
							<input onclick="$(this).prev().val(this.checked ? 1 : 0)" type="checkbox">
						</p>
					</div>
				</div>
			</div>
			<div class="field is-horizontal">
				<div class="field-label is-normal">
					<label class="label">Foto</label>
				</div>
				<div class="field-body">
					<div class="field">
						<p class="control">
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
						</p>
						@if($errors->has('intake_picture'))
						<p class="has-text-danger control">{{ $errors->first('intake_picture') }}</p>
						@endif
					</div>
				</div>
			</div>
			<button class="button is-primary is-pulled-right">Versturen</button>
		</div>
	</div>
</form>
@endif
@endsection
@push('script-partials')
<script src="{{ mix('js/binderform.js') }}"></script>
@endpush
