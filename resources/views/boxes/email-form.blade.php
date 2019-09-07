<!--
TODO: Send redirects to dashboard: stay on page.
TODO: Keep email box open on error
TODO: Move script to footer
------------------------->


<div id="email-form" class="box box-primary" style="display: none;">
	<div class="box-header with-border primary">
		<h3 class="box-title">Verstuur klapperformulier</h3>

		<div class="box-tools pull-right">

			<button onclick="resetForm()" type="button" class="btn btn-box-tool toggle" data-target="email-form"><i class="fa fa-times"></i><span class="sr-only">Sluit emailformulier</span></button>
		</div>
		<!-- /.box-tools -->
	</div>
	<!-- /.box-header -->
	<form id="SendBinderform" action="{{ route('post-send-binder-form') }}" method="POST">
		@csrf
		<div class="box-body">

			<div class="field clearfix .form-group @if($errors->has('name')) has-error @endif col-md-6 ">
				<label>Naam</label>
				<div class="control">
					<input name="name" class="input form-control" type="text" placeholder="Naam ontvanger Klapperformulier">
					@if($errors->has('name'))
					<p class="has-text-danger help-block clearfix">{{ $errors->first('name') }}</p>
					@endif
				</div>
			</div>

			<div class="field clearfix .form-group @if($errors->has('email')) has-error @endif col-md-6 ">
				<label>Email</label>
				<div class="control">
					<input name="email" class="input form-control" type="" placeholder="Email ontvanger Klapperformulier">
					@if($errors->has('email'))
					<p class="has-text-danger help-block clearfix">{{ $errors->first('email') }}</p>
					@endif
				</div>
			</div>

		</div>

		<div class="box-footer">
			<div class="pull-right">
				<div class="control">
					<button type="submit" class="btn btn-primary">Verstuur</button>
					<button onclick="resetForm()" class="btn btn-default toggle" data-target="email-form">Annuleren</button>
				</div>
			</div>
		</div>
	</form>
</div>

<script>
	function resetForm() {
		document.getElementById("SendBinderform").reset();
	}

</script>
