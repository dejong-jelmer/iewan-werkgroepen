<!--
TODO: User image function
------------------------->

<div class="box">
	<div class="box-header with-border box-primary">
		<h3 class="box-title">Werkgroep Leden</h3>
	</div>
	<!-- /.box-header -->

	<div class="box-body no-padding">
		<ul class="users-list clearfix">

			@forelse($workgroup->users as $user)
			<li>
				<img src="https://i.pravatar.cc/48?u={{$user->id}}" alt="Profielfoto">
				<a class="users-list-name" href="{{ route('user', ['user_id' =>  $user->id]) }}">{{ $user->name }}</a>
			</li>

			@empty
			<p>Deze werkgroep heeft geen leden</p>
			@endforelse

		</ul>
		<!-- /.users-list -->
	</div>
	<!-- /.box-body -->

	<div class="box-footer text-center">
		@if(!auth()->user()->inWorkgroup($workgroup->id))
		<button class="btn btn-primary" href="#" onclick="$('#join-workgroup-form').submit();">Ga bij deze werkgroep</button>
		@endif
		@if(auth()->user()->inWorkgroup($workgroup->id))
		<button class="btn btn-default" href="#" onclick="$('#leave-workgroup-form').submit();">Werkgroep verlaten</button>
		@endif
	</div>
	<!-- /.box-footer -->
</div>
<!-- /.box -->
