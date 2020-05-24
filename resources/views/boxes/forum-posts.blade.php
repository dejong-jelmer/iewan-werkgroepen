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
            {{-- @todo is een form in een form, daardoor wekrt forum bericht posten niet meer --}}
        {{-- @boxes('UploadFile') --}}

		</div>
		<div class="box-footer">
			<div class="pull-right">
				<div class="control">
					<input type="submit" class="btn btn-primary" value="Plaats">

					<button onclick="event.preventDefault();" class="btn btn-default toggle-forumpost-field">Annuleren</button>
				</div>
			</div>
		</div>
	</form>
        @boxes('UploadFile')

</div>
