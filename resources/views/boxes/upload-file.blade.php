	<div id="file-upload" class="box" style="display: none;">
		<div class="box-header">
			<h3 class="box-title">Bestand uploaden</h3>

			<div class="pull-right box-tools">
				<button type="button" class="btn btn-box-tool toggle" data-target="file-upload" data-toggle="tooltip" title="Remove">
					<i class="fa fa-times"></i></button>
			</div>
		</div>
		<!-- /.box-header -->

		<form action="{{ route('file-upload') }}" method="POST" role="form" enctype="multipart/form-data">
			@csrf
            <div class="box-body">
				<div class="form-group col-md-12">
					<label for="exampleInputFile">Selecteer je bestand</label>
					<input name="file" type="file" id="exampleInputFile" class="btn btn-default btn-flat">

				</div>

				<div class="form-group form-group-sm col-md-5 pull-left">
					<label class="sr-only">soort document</label>
					<select name="type" class="form-control">
						<option disabled="disabled" selected="selected">Selecteer documentsoort</option>
						@foreach($fileTypes as $type)
                            <option value="{{ $type }}">{{ $type }}</option>
                        @endforeach
					</select>
				</div>

                @if(Request::route()->getName() == 'files')

				<div class="form-group form-group-sm col-md-5 pull-left">
					<label class="sr-only">Werkgroep</label>
					<select name="workgroup" class="form-control">
						<option disabled="disabled" selected="selected">Selecteer werkgroep</option>
                        @php
                        // add 'algemeen' to workgroups
                            $workgroups = auth()->user()->activeWorkgroups;
                            $workgroups->prepend(new \App\workgroup(['id' => 10, 'name' => 'algemeen']));
                        @endphp
						@foreach($workgroups as $workgroup)
    						<option value="{{ $workgroup->id}}">{{ $workgroup->name  }}</option>
						@endforeach
                        @php
                        // remove 'algemeen' from workgroups
                            $workgroups->shift();

                        @endphp

					</select>
				</div>
				@else
				<!-- Hoe krijg ik de workgroup-id hier als value? -->
				<input name="workgroup" type="hidden" value="@isset($workgroup){{ $workgroup->id }}@endisset">
				@endif


			</div>

			<div class="box-footer clearfix">
				<div class="pull-left">
					<button class="btn btn-primary">Bestand uploaden</button>

				</div>

			</div>
		</form>
	</div>
	<!-- /.box -->
