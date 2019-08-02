@if(!empty($post))


<div class="box-body">
	<div class="post">

		<div class="user-block">
			<img class="img-circle" src="https://i.pravatar.cc/200?img={{ $post->user->name }}}}" alt="User Image">
			<span class="username">
				<a href="#">{{ $post->user->name }}</a>
			</span>
			<span class="description">{{ $post->created_at->diffForHumans() }}</span>
		</div>



		<p>


			@if(!empty($showBody))
			<br>
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
