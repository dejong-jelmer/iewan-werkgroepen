<div id="forum-post" class="box box-primary" style="display: none;">
	<div class="box-header with-border primary">
		<h3 class="box-title">Nieuw Bericht</h3>
		<!-- TODO: ForumPagination -->
		<div class="box-tools pull-right">


		</div>
		<!-- /.box-tools -->
	</div>
	<!-- /.box-header -->
	<form action="{{ route('create-post') }}" method="POST">
		@csrf
		<div class="box-body">

			<div class="form-group col-md-12">
				<label class="label">Titel</label>
				<div class="control">
					<input name="title" class="input form-control input-lg" type="text" placeholder="Titel">
				</div>
			</div>
			<div class="form-group  col-md-12">
				<label class="label">Tekst</label>
				<div class="control">
					<textarea name="body" class="textarea editor" placeholder="Schrijf nieuw een forum bericht..." row="6"></textarea>
				</div>
			</div>

			<div class="form-group col-md-12">
				<label for="exampleInputFile">Voeg een bestand toe</label>
				<input type="file" id="exampleInputFile" class="btn btn-default btn-flat">

			</div>

			<div class="form-group form-group-sm col-md-5 pull-left">
				<label class="sr-only">soort document</label>
				<select class="form-control">
					<option>Selecteer documentsoort</option>
					<option>Notulen</option>
					<option>Verslagen</option>
					<option>Voorstellen</option>
					<option>Handleidingen</option>
					<option>Overigen</option>
				</select>
			</div>

			<!-- On files template -->
			<div class="form-group form-group-sm col-md-5 pull-left">
				<label class="sr-only">Werkgroep</label>
				<select class="form-control">
					<option>Selecteer Werkgroep</option>
					@foreach(auth()->user()->workgroups as $workgroup)
					<option value="{{ $workgroup->id}}">{{ $workgroup->name  }}</option>
					@endforeach
				</select>
			</div>

		</div>
		<div class="box-footer">
			<div class="pull-right">
				<div class="control">
					<button type="submit" class="btn btn-primary">Plaats</button>

					<button onclick="event.preventDefault();" class="btn btn-default toggle-forumpost-field">Annuleren</button>
				</div>
			</div>
		</div>
	</form>

</div>
