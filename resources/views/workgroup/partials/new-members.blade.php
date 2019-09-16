<!--
TODO: New members loop function
TODO: Accept/ Decline function
TODO: User image function
------------------------->

<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">Nieuwe werkgroepleden</h3>
	</div>
	<!-- /.box-header -->

	<div class="box-body no-padding">
		<table class="table">


			@foreach($workgroup->applicants as $user)

			@endforeach



			<tr>
				<td style="width: 50px"><img src="https://i.pravatar.cc/48?u=1" alt="Profielfoto"></td>
				<td><a href="#">Jelmer</a></td>
				<td class="iw-icon-cell"><button class="btn btn-success" title="Accepteren"><i class="fa fa-check"></i><span class="sr-only">Accepteren</span></button></td>
				<td class="iw-icon-cell"><button class="btn btn-danger" title="Weigeren"><i class="fa fa-ban"></i><span class="sr-only">Weigeren</span></button></td>
			</tr>

			<tr>
				<td><img src="https://i.pravatar.cc/48?u=2" alt="Profielfoto"></td>
				<td><a href="#">Wen</a></td>
				<td class="iw-icon-cell"><button class="btn btn-success" title="Accepteren"><i class="fa fa-check"></i><span class="sr-only">Accepteren</span></button></td>
				<td class="iw-icon-cell"><button class="btn btn-danger" title="Weigeren"><i class="fa fa-ban"></i><span class="sr-only">Weigeren</span></button></td>
			</tr>
		</table>
	</div>
	<!-- /.box-body -->
</div>
<!-- /.box -->
