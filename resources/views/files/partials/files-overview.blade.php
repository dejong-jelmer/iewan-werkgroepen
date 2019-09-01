<!--
TODO: Whole file upload function
TODO: Dynamic (?) documents selection
TODO: implement select2.js for multiple selection
TODO: Search function
TODO: Check if workgroup template or files template
TODO: Workgroups select loop doesn't work
TODO: Pagination
------------------------->


<div class="box">
	<div class="box-header">
		<h3 class="box-title">Bestanden</h3>

		<div class="box-tools">
			<div class="row">
				<!-- select -->
				<div class="form-group form-group-sm hidden-xs col-xs-4">
					<label class="sr-only">soort document</label>
					<select class="form-control">
						<option>Filter documenten</option>
						<option>Notulen</option>
						<option>Verslagen</option>
						<option>Voorstellen</option>
						<option>Handleidingen</option>
						<option>Overigen</option>
					</select>
				</div>

				<!-- On files template -->
				<div class="form-group form-group-sm hidden-xs col-xs-4">
					<label class="sr-only">Werkgroep</label>
					<select class="form-control">
						<option>Filter op Werkgroep</option>
						@isset($workgroups)						@foreach($workgroups as $workgroup)
						<option value="{{ $workgroup->id}}">{{ $workgroup->name  }}</option>
						@endforeach
						@endisset
					</select>
				</div>


				<div class="input-group input-group-sm hidden-xs col-xs-3">
					<input type="text" name="table_search" class="form-control" placeholder="Zoek bestand">

					<div class="input-group-btn">
						<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /.box-header -->
	<div class="box-body table-responsive no-padding">
		<table class="table table-hover">

			<tr>
				<td><i class="fa fa-file-pdf-o"></i></td>
				<td><a href=#>Presentatie voorstel winst DKW.pdf</a></td>
				<td><span class="label label-default">Voorstel</span></td>
				<td>240 kB</td>
				<td>20-05-2019 14:47</td>
			</tr>

			<tr>
				<td><i class="fa fa-file-word-o"></i></td>
				<td><a href=#>Voorstel inbraakpreventie schuurtjes.docx </a></td>
				<td><span class="label label-default">Voorstel</span></td>
				<td>16 kB</td>
				<td>19-05-2019 12:10</td>
			</tr>

		</table>
	</div>
	<!-- /.box-body -->

	<div class="box-footer clearfix">
		<div class="file-upload pull-left">
			<button class="btn btn-primary toggle scroll" data-target="file-upload">Nieuw bestand toevoegen</button>

		</div>
		<ul class="pagination pagination-sm no-margin pull-right">
			<li><a href="#">&laquo;</a></li>
			<li><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">&raquo;</a></li>
		</ul>
	</div>
</div>
<!-- /.box -->

@include('files.partials.upload-file')
