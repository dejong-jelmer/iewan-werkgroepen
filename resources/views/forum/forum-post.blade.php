@extends('layout.layout')
@section('title') Forum: @if(!empty($post)) {{ $post->title }} @endif @endsection
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header clearfix">
	<h1 class="pull-left">
		{{ $post->title }}
	</h1>

</section>

<!-- Main content -->
<section class="content clearfix">
	<div class="row">

		<div class="col-lg-2 pull-right">

			<a class="btn btn-default" href="{{ route('forum') }}">Terug naar het forum overzicht</a>

		</div>


		<div class="col-lg-10">
			<div class="box">


				@include('boxes.forum-post', [
				'post' => $post,
				'showBody' => true,
				'allowResponse' => true,
                'edit' => !empty($isEdit) ? $isEdit : false
				])
			</div>
			<div class="box">
				<!-- TODO: CommentCheck -->
				<div class="box-header with-border">
					<!-- TODO CommentCount -->
					<h3 class="box-title">{{ $post->responses()->count() }} reacties</h3>

					<div class="box-tools pull-right">

					</div>
				</div>

				@forelse($post->responses as $response)
				@include('boxes.forum-post', [
				'post' => $response,
				'showBody' => true,
				'allowResponse' => false
				])
				@empty
				@endforelse
			</div>

			@include('boxes.forum-post-response', ['post' => $post])

		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
</section>
<!-- /.content -->
@endsection
