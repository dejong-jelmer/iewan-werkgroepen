<div class="box">
	<div class="box-header">
		<h3 class="box-title">Veto Periode</h3>

		<div class="box-tools">

		</div>
	</div>
	<!-- /.box-header -->
	<div class="box-body table-responsive no-padding">
		<table class="table table-hover">
			<tr>

				<th style="width: 100px">Aanmelding</th>
				<th style="width: 140px">Vetoperiode tot</th>
				<th>Naam</th>
				<th>Naam partner</th>
				<th>Woningvoorkeur (1)</th>
				<th>woningvoorkeur (2)</th>

				@if(auth()->user()->hasWorkgroupRole('aanname'))

				<th class="iw-icon-cell"></th>
				<th class="iw-icon-cell"></th>
				<th class="iw-icon-cell"></th>


				@endif
				<th class="iw-icon-cell"></th>


			</tr>

			<tr>
				<td>2 aug '19</td>
				<td>12 aug '19</td>

				<td><a href="#">Thomas Mennen</a></td>
				<td>Ani Öhman</td>
				<td>Eenpersoons</td>
				<td>Gezinswoning</td>

				@if(auth()->user()->hasWorkgroupRole('aanname'))

				<td class="iw-icon-cell"><button class="btn btn-success iw-icon-cell" title="Accepteren"><i class="fa fa-check"></i><span class="sr-only">Accepteren</span></button></td>
				<td><button class="btn btn-default iw-icon-cell" title="Bewerken"><i class="fa fa-pencil"></i><span class="sr-only">Bewerken</span></button></td>
				<td><button class="btn btn-default iw-icon-cell" title="Verwijderen"><i class="fa fa-trash"></i><span class="sr-only">Verwijderen</span></button></td>

				@endif
				
				  <td class="iw-icon-cell">
                 {{--               <input type="text" value="{{ route('binder-form', ['form_id' => $form->id]) }}" id="form{{ $form->id }}" class="iw-hide"> --}}
                                
                        		<button class="btn btn-default iw-on-hover" title="Kopier URL naar klembord" {{-- onclick="copyURL('form{{ $form->id }}', '{{ $form->name }}')" --}}>
                                 
               <i class="fa fa-clipboard"></i><span class="sr-only">Kopier URL naar klembord</span></button>
                </td>
			</tr>





		</table>
	</div>
	<div class="box-footer clearfix">
		<div class="box-tools pull-right">

		</div>
	</div>
	<!-- /.box-body -->
</div>
<!-- /.box -->
