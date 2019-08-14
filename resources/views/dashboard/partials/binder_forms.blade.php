			<div class="box">
				<div class="box-header">
					<h3 class="box-title"><a href="{{ route('binder-forms') }}">Nieuwe klapper aanmeldingen</a></h3>

					<div class="box-tools">

					</div>
				</div>
				<!-- /.box-header -->


				<div class="box-body table-responsive no-padding">
					<table class="table table-hover">
						<tr>

							<th style="width: 200px">Aanmelding</th>
							<th>Naam</th>
							<th>Naam partner</th>
							<th>Woningvoorkeur (1)</th>
							<th>woningvoorkeur (2)</th>
							<th>Bekeken</th>

							<th style="width: 40px"></th>
							<th style="width: 40px"></th>
							<th style="width: 40px"></th>


						</tr>

						@forelse($binderForms as $form)
						<tr>
							<td>2 aug '19</td>
							<td><a href="#">Thomas Mennen</a></td>
							<td>Ani Öhman</td>
							<td>Eenpersoons</td>
							<td>Gezinswoning</td>
							<td>0</td>
							<td style="width: 40px"><button class="btn btn-success" title="Accepteren"><i class="fa fa-check"></i><span class="sr-only">Accepteren</span></button></td>
							<td><button class="btn btn-default" title="Bewerken"><i class="fa fa-pencil"></i><span class="sr-only">Bewerken</span></button></td>
							<td><button class="btn btn-default" title="Verwijderen"><i class="fa fa-trash"></i><span class="sr-only">Verwijderen</span></button></td>
						</tr>
						@empty
						<td>Geen (nieuwe) klapper formulieren</td>
						@endforelse
					</table>
				</div>
				<div class="box-footer clearfix">
					@if(method_exists($binderForms, 'links'))
					{{ $binderForms->links('vendor.pagination.bulma', ['bulmaClasses' => 'is-small is-left', 'next' => 'Volgende', 'previous' => 'Vorige']) }}
					@endif

				</div>
				<!-- /.box-body -->
			</div>

			<!-- /.box -->
