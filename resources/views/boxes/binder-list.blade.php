			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Klapper</h3>

					<div class="box-tools">
						<div class="input-group input-group-sm hidden-xs" style="width: 150px;">
							<input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

							<div class="input-group-btn">
								<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
							</div>
						</div>
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body table-responsive no-padding">
					<table class="table table-hover">
						<tr>

							<th style="width: 240px">Aanmelding</th>
							<th>Naam</th>
							<th>Naam partner</th>
							<th>Woningvoorkeur (1)</th>
							<th>woningvoorkeur (2)</th>

							@if(auth()->user()->hasWorkgroupRole('aanname'))

							<th class="iw-icon-cell"></th>
							<th class="iw-icon-cell"></th>
							<th class="iw-icon-cell"></th>

							@endif


						</tr>

						<tr>

							@foreach ($binderForms as $form)
							@if($form->released)
						<tr>




							<td>{{ $form->filled_in }}</td>
							<td><a href="{{ route('binder-form', ['form_id' => $form->id]) }}">{{ $form->name }}</a></td>
							<td>Ani Öhman</td>
							<td>Eenpersoons</td>
							<td>Gezinswoning</td>


							@if(auth()->user()->hasWorkgroupRole('aanname'))

							<td></td>
							<td><button class="btn btn-default" title="Bewerken"><i class="fa fa-pencil"></i><span class="sr-only">Bewerken</span></button></td>
							<td><button class="btn btn-default" title="Verwijderen"><i class="fa fa-trash"></i><span class="sr-only">Verwijderen</span></button></td>

							@endif
						</tr>
						@endif
						@endforeach
					</table>
				</div>
				<div class="box-footer clearfix">
					<div class="box-tools pull-right">
						<div class="input-group input-group-sm hidden-xs" style="width: 150px;">
							<input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

							<div class="input-group-btn">
								<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
							</div>
						</div>
					</div>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
