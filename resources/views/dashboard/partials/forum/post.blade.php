@if(!empty($post))

<div class="box-header">
	<div class="user-block">
		<!-- TODO UserAvatar -->
		<img class="img-circle" src="https://i.pravatar.cc/200?img={{ $post->user->id }}}}" alt="User Image">
		<span class="username">
			<!-- TODO: UserProfileURL -->
			<a href="{{ route('user', ['user_id' =>  $post->user->id]) }}">{{ $post->user->name }}</a>
		</span>
		<span class="description">{{ $post->created_at->diffForHumans() }}</span>
	</div>
	<div class="box-tools pull-right">
		<div class="btn-group">

			@if(auth()->user()->hasWorkgroupRole('intern') || $post->user->id == auth()->user()->id )

			<button class="btn btn-default" title="Bewerken"><i class="fa fa-pencil"></i><span class="sr-only">Bewerken</span></button>
			<button class="btn btn-default" title="Verwijderen"><i class="fa fa-trash"></i><span class="sr-only">Verwijderen</span></button>
			@endif
			@if(auth()->user()->hasWorkgroupRole('intern'))
			<button class="btn btn-default" title="Sticky"><i class="fa  fa-thumb-tack"></i><span class="sr-only">Maak sticky</span></button>

			<button class="btn btn-default" title="Sluiten"><i class="fa fa-lock"></i><span class="sr-only">Sluiten</span></button>

			@endif







		</div>
	</div>

</div>
<div class="box-body">
	<div class="post">





		<p>


			@if(!empty($showBody))
			{!! html_entity_decode($post->body) !!}
			@endif
		</p>


	</div>
	<!-- /.post -->


</div>
<!-- /.box-body -->
<div class="box-footer">

</div>
<!-- /.box-footer-->


@endif
