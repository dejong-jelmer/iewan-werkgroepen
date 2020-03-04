<!--
TODO: Whole file upload function -- done
TODO: Dynamic (?) documents selection -- done
TODO: implement select2.js for multiple selection
TODO: Search function -- done
TODO: Check if workgroup template or files template
TODO: Workgroups select loop doesn't work
TODO: Pagination -- do we need that?
------------------------->


<div class="box">
	<div class="box-header">
		<h3 class="box-title">Bestanden</h3>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif

		<div class="box-tools">
			<div class="row">
				<!-- select -->
				<div class="form-group form-group-sm hidden-xs col-xs-4">
					<label class="sr-only">soort document</label>
					<select id="type_filter" class="form-control" onchange="filterTable()">
						<option value="">Filter documenten</option>
						@foreach($fileTypes as $type)
                            <option value="{{ $type }}">{{ $type }}</option>
                        @endforeach
					</select>
				</div>

				<!-- On files template -->
				@if(Request::route()->getName() == 'files')
				<div class="form-group form-group-sm hidden-xs col-xs-4">
					<label class="sr-only">Werkgroep</label>
					<select id="workgroup_filter" class="form-control" onchange="filterTable()">
						<option value="">Filter op Werkgroep</option>
						@isset($workgroups)
    						@foreach($workgroups as $workgroup)
    						<option value="{{ $workgroup->name }}">{{ $workgroup->name  }}</option>
    						@endforeach
						@endisset
					</select>
				</div>
				@endif


				<div class="input-group input-group-sm hidden-xs col-xs-3">
					<input type="text" id="search_filter" name="search_filter" class="form-control" placeholder="Zoek bestand" onkeydown="filterTable()">

					<div class="input-group-btn">
						<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /.box-header -->
	<div class="box-body table-responsive no-padding">
		<table id="files_table" class="table table-hover">
            @forelse($files as $file)
                <tr>
                    <td><i class="{{ getFileIcon($file->ext) }}"></i></td>
                    <td><a href={{ route('file-download', ['file_id' => $file->id]) }}>{{ $file->name }}</a></td>
                    <td><span class="label label-default">{{ $file->type }}</span></td>

                    <td><span class="label label-primary">{{ $file->workgroup->name }}</span></td>


                    <td>{{ formatBytes($file->size) }}</td>
                    <td>{{ $file->created_at->isoFormat('LL') }}</td>
                </tr>
            @empty
                <tr>
                    <td>Geen bestanden</td>
                </tr>
            @endforelse
		</table>
	</div>
	<!-- /.box-body -->

	<div class="box-footer clearfix">
		@if((Request::route()->getName() == 'files') || (auth()->user()->inWorkgroup($workgroup->id)))
		<div class="file-upload pull-left">
			<button class="btn btn-primary toggle scroll" data-target="file-upload">Nieuw bestand toevoegen</button>

		</div>
		@endif
        {{-- <div class="pull-right">
            {{ $files->links() }}
        </div> --}}
	{{-- 	<ul class="pagination pagination-sm no-margin pull-right">
			<li><a href="#">&laquo;</a></li>
			<li><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">&raquo;</a></li>
		</ul> --}}
	</div>
</div>
@push('script-partials')
<script>
    // @todo: dropdowns combineren, lege value alles weergeven
    function filterTable() {
      // Declare variables
      var search_filter, workgroup_filter, type_filter, tds, td_name, td_type, td_workgroup, nameTxtValue, typeTxtValue, workgroupTxtValue;
      search_filter = $('#search_filter').val().toUpperCase();
      workgroup_filter = $('#workgroup_filter').val().toUpperCase();
      type_filter = $('#type_filter').val().toUpperCase();

      $('#files_table').find('tr').each(function() {
        tds = $(this).find('td');
        td_name = tds[1];
        td_type = tds[2];
        td_workgroup = tds[3];
        if(td_type && td_workgroup && td_name) {
            nameTxtValue = td_name.innerText || td_name.textContent;
            typeTxtValue = td_type.innerText || td_type.textContent;
            workgroupTxtValue = td_workgroup.innerText || td_workgroup.textContent;
            if(
                nameTxtValue.toUpperCase().indexOf(search_filter) > -1 &&
                typeTxtValue.toUpperCase().indexOf(type_filter) > -1 &&
                workgroupTxtValue.toUpperCase().indexOf(workgroup_filter) > -1
            ) {
                $(this).show();
            } else {
                $(this).hide();
            }
        }
      });

}
</script>
@endpush
<!-- /.box -->
@boxes('UploadFile')
{{-- @include('boxes.upload-file') --}}