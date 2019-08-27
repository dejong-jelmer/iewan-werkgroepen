	<div id="file-upload" class="box" style="display: none;">
		<div class="box-header">
			<h3 class="box-title">Bestand uploaden</h3>

			<div class="pull-right box-tools">
				<button type="button" class="btn btn-box-tool toggle" data-target="file-upload" data-toggle="tooltip" title="Remove">
					<i class="fa fa-times"></i></button>
			</div>
		</div>
		<!-- /.box-header -->

		<form role="form">
			<div class="box-body table-responsive">

				<div class="form-group">
					<label for="exampleInputFile">Selecteer je bestand</label>
					<input type="file" id="exampleInputFile" class="btn btn-default btn-flat">

				</div>

				<div class="form-group form-group-sm col-xs-4 pull-left">
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
				<div class="form-group form-group-sm col-xs-4 pull-left">
					<label class="sr-only">Werkgroep</label>
					<select class="form-control">
						<option>Selecteer Werkgroep</option>
						@isset($workgroups)
						@foreach(auth()->user()->workgroups as $workgroup)
						<option value="{{ $workgroup->id}}">{{ $workgroup->name  }}</option>
						@endforeach
						@endisset
					</select>
				</div>


			</div>

			<div class="box-footer clearfix">
				<div class="pull-left">
					<button class="btn btn-primary">Bestan uploaden</button>

				</div>

			</div>
		</form>
	</div>
	<!-- /.box -->
