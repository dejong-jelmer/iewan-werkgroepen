<!--
TODO: Accept/ Decline function
TODO: User image function
------------------------->

@if(isset($workgroup->applicants) && count($workgroup->applicants) > 0 )


<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">Nieuwe werkgroepleden</h3>
	</div>
	<!-- /.box-header -->

	<div class="box-body no-padding">
		<table class="table">


			@foreach($workgroup->applicants as $user)
			<tr>
				<td style="width: 50px"><img src="https://i.pravatar.cc/48?u={{$user->id}}" alt="Profielfoto"></td>
				<td><a class="users-list-name" href="{{ route('user', ['user_id' =>  $user->id]) }}">{{ ucfirst($user->name) }}</a></td>


				<td class="iw-icon-cell"><a href="{{ Route('workgroup-accept-application', ['workgroup_id' => $workgroup->id, 'user_id' => $user->id]) }}" class="btn btn-success" title="Accepteren"><i class="fa fa-check"></i><span class="sr-only">Accepteren</span></a></td>
				<td class="iw-icon-cell"><a href="{{ Route('workgroup-decline-application', ['workgroup_id' => $workgroup->id, 'user_id' => $user->id]) }}" class="btn btn-danger" title="Weigeren"><i class="fa fa-ban"></i><span class="sr-only">Weigeren</span></a></td>


			</tr>


			@endforeach


		</table>
	</div>
	<!-- /.box-body -->
</div>
<!-- /.box -->


@endif
