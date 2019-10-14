<!--
TODO: User image function
------------------------->

<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">Werkgroep Leden</h3>
	</div>
	<!-- /.box-header -->

	<div class="box-body">
		<ul class="users-list clearfix">

			@forelse($workgroup->activeUsers as $user)
			<li>
				<a class="users-list-name" href="{{ route('user', ['user_id' =>  $user->id]) }}"><img src="https://i.pravatar.cc/48?u={{$user->id}}" alt="Profielfoto"><br>
					{{ ucfirst($user->name) }}</a>
			</li>

			@empty
			<p><i>Deze werkgroep heeft geen leden</i></p>
			@endforelse

		</ul>
		<!-- /.users-list -->
	</div>
	<!-- /.box-body -->

	<div class="box-footer">
		@if(auth()->user()->inWorkgroup($workgroup->id))
		<button class="btn btn-default pull-right" href="#" onclick="$('#leave-workgroup-form').submit();">Werkgroep verlaten</button>
		@elseif(auth()->user()->hasAppliedForWorkgroup($workgroup->id))
		<button class="btn btn-default pull-right" href="#" onclick="$('#leave-workgroup-form').submit();">Aanvraag intrekken</button>
		@else
		<button class="btn btn-primary" href="#" onclick="$('#join-workgroup-form').submit();">Ga bij deze werkgroep</button>
		@endif
	</div>
	<!-- /.box-footer -->
</div>
<!-- /.box -->
