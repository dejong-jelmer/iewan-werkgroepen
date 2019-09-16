@extends('layout.layout')
@section('title') Forum: @if(!empty($post)) {{ $post->title }} @endif @endsection
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h2>
		Forum
	</h2>

</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-9">
			<div class="box">


				@include('dashboard.partials.forum.post', [
				'post' => $post,
				'showBody' => true,
				'allowResponse' => true
				])
			</div>
			<div class="box">
				<!-- TODO: CommentCheck -->
				<div class="box-header with-border">
					<!-- TODO CommentCount -->
					<h3 class="box-title">5 reacties</h3>

					<div class="box-tools pull-right">

					</div>
				</div>

				@forelse($post->responses as $response)
				@include('dashboard.partials.forum.post', [
				'post' => $response,
				'showBody' => true,
				'allowResponse' => false
				])
				@empty
				@endforelse
			</div>

			@include('dashboard.partials.forum.response', ['post' => $post])



		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
</section>
<!-- /.content -->
@endsection
