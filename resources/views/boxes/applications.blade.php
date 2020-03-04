<div class="box">
	<div class="box-header">
		<h3 class="box-title">Nieuwe klapper aanmeldingen</h3>
		<div class="box-tools">

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

				<th class="iw-icon-cell"></th>
				<th class="iw-icon-cell"></th>
				<th class="iw-icon-cell"></th>

			</tr>
			@foreach ($applications as $application)
			<tr>

				<td>{{ $application->filled_in }}</td>
				<td><a href="{{ route('binder-form', ['form_id' => $application->id]) }}">{{ $application->name }}</a></td>
				<td>Ani Öhman</td>
				<td>Eenpersoons</td>
				<td>Gezinswoning</td>
				<td class="iw-icon-cell"><a href="{{ route('release-form', ['form_id' => $application->id]) }}" class="btn btn-success" title="Accepteren"><i class="fa fa-check"></i><span class="sr-only">Accepteren</span></a></td>
				<td><button class="btn btn-default" title="Bewerken"><i class="fa fa-pencil"></i><span class="sr-only">Bewerken</span></button></td>
				<td><button class="btn btn-default" title="Verwijderen"><i class="fa fa-trash"></i><span class="sr-only">Verwijderen</span></button></td>

			</tr>
			@endforeach




		</table>
	</div>
	<!-- /.box-body -->
</div>
<!-- /.box -->
