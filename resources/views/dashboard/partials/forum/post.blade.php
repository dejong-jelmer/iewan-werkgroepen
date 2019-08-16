@if(!empty($post))


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






