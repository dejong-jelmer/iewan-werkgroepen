<!--
TODO: Whole file upload function -- done
TODO: Dynamic (?) documents selection -- done
TODO: implement select2.js for multiple selection
TODO: Search function -- done
TODO: Check if workgroup template or files template
TODO: Workgroups select loop doesn't work
TODO: Pagination -- do we need that?
------------------------->


@if($errors->any())
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-times"></i> Uploaden mislukt.</h4>
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif



<div class="box">
    <div class="box-header">
        <h3 class="box-title">Bestanden</h3>


        <div class="box-tools">
                <!-- select -->
                <div class="col-md-4">
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
                <div class="col-md-4">
                    <label class="sr-only">Werkgroep</label>
                    <select id="workgroup_filter" class="form-control" onchange="filterTable()">
                        <option value="">Filter op Werkgroep</option>
                        @isset($workgroups)
                        @php
                            $workgroups->prepend(new \App\workgroup(['id' => 10, 'name' => 'algemeen']));
                        @endphp
                        @foreach($workgroups as $workgroup)
                        <option value="{{ $workgroup->name }}">{{ $workgroup->name  }}</option>
                        @endforeach
                        @php
                            $workgroups->shift();
                        @endphp
                        @endisset
                    </select>
                </div>
                @endif

                <div class="col-md-4">

                <div class="input-group">
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
                <td class="iw-fileicon"><i class="{{ getFileIcon($file->ext) }}"></i></td>
                <td><a href="{{ route('file-download', ['file_id'=> $file->id]) }}">{{ $file->name }}</a></td>
                                <td><a href="{{ route('file-download', ['file_id'=> $file->id]) }}" class="iw-downloadfile"><i class="fa fa-download"></i></a></td>

                <td><span class="label label-default">{{ $file->type }}</span></td>

@if(Request::route()->getName() == 'files')
                <td><span class="label label-primary">{{ $file->workgroup->name ?? 'algemeen' }}</span></td>
                @endif


                <td>{{ formatBytes($file->size) }}</td>
                <td>{{ $file->created_at->isoFormat('LL') }}</td>
                               <td class="iw-icon-cell">
                        		<button class="btn btn-default iw-on-hover" title="Bewerk"><i class="fa fa-edit"></i><span class="sr-only">Bewerken</span></button>
                </td>
                                               <td class="iw-icon-cell">
                        		<button class="btn btn-default iw-on-hover" title="Verwijderen"><i class="fa fa-trash"></i><span class="sr-only">Verwijderen</span></button>
                </td>
                                               <td class="iw-icon-cell">
                                <input type="text" value="{{ route('file-download', ['file_id'=> $file->id]) }}" id="document{{ $file->id }}" class="iw-hide">
                                
                        		<button class="btn btn-default iw-on-hover" title="Kopier URL naar klembord" onclick="copyURL('document{{ $file->id }}', '{{ $file->name }}')">
                                 
               <i class="fa fa-clipboard"></i><span class="sr-only">Kopier URL naar klembord</span></button>
                </td>

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
    {{-- <ul class="pagination pagination-sm no-margin pull-right">
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
    // @todo: in app.js krijgen zodat hij op andere plekken aanroepbaar is.
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
            if (td_type && td_workgroup && td_name) {
                nameTxtValue = td_name.innerText || td_name.textContent;
                typeTxtValue = td_type.innerText || td_type.textContent;
                workgroupTxtValue = td_workgroup.innerText || td_workgroup.textContent;
                if (
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

function copyURL(documentID, documentName) {
    
  var copyText = document.getElementById(documentID);
  copyText.select();
  copyText.setSelectionRange(0, 99999);
  document.execCommand("copy");
    alert( "Locatie van \"" + documentName + "\" gekopieerd naar het klembord")
  
//  var tooltip = document.getElementById("myTooltip");
//  tooltip.innerHTML = "Copied: " + copyText.value;
}

// function outFunc() {
//  var tooltip = document.getElementById("myTooltip");
//  tooltip.innerHTML = "Copy to clipboard";
// }
</script>


@endpush
<!-- /.box -->
@isset($workgroup)
    @boxes('UploadFile',  ['workgroup' => $workgroup])
@else
    @boxes('UploadFile')
@endisset
{{-- @include('boxes.upload-file') --}}
