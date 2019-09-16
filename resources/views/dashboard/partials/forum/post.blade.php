@if(!empty($post))

<div class="box-header">
	<h1 class="box-title">hallo</h1>
	<div class="box-tools pull-right">
		<div class="btn-group">

			<button class="btn btn-default" title="Sticky"><i class="fa  fa-thumb-tack"></i><span class="sr-only">Maak sticky</span></button>

			<button class="btn btn-default" title="Sluiten"><i class="fa fa-lock"></i><span class="sr-only">Sluiten</span></button>


		</div>
	</div>

</div>
<div class="box-body">
	<div class="post">

		<div class="user-block">
			<!-- TODO UserAvatar -->
			<img class="img-circle" src="https://i.pravatar.cc/200?img={{ $post->user->name }}}}" alt="User Image">
			<span class="username">
				<!-- TODO: UserProfileURL -->
				<a href="#">{{ $post->user->name }}</a>
			</span>
			<span class="description">{{ $post->created_at->diffForHumans() }}</span>
		</div>



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
