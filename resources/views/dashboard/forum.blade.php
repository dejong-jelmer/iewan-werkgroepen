@extends('layout.layout')
@section('title') Forum @endsection
@section('content')

<section class="content-header">
	<h1>
		Forum
	</h1>

</section>


<section class="content">
	<div class="row">
		<div class="col-md-9">

			@include('dashboard.partials.forum.create-post')

			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Berichten</h3>

					<!-- TODO: ForumPagination -->
					<div class="box-tools pull-right">
						1-50/200
						<div class="btn-group">
							<button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
							<button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
						</div>
						<!-- /.btn-group -->

					</div>
					<!-- /.box-tools -->
				</div>
				<!-- /.box-header -->
				<div class="box-body no-padding">

					<div class="table-responsive forum-messages">
						<table class="table table-hover table-striped">
							<tbody>
								@forelse($posts as $post)
								@if(!empty($post))
								<tr>
									<!-- TODO: .new message class -->
									<td class="forum-alert text-yellow" style="width: 30px;"><i class="fa fa-comment-o"></i></td>
									<td class="forum-date text-muted" style="width: 200px;">{{ $post->created_at->diffForHumans() }}</td>
									<td class="forum-subject"><a href="{{ route('forum-posts', ['post_id' => $post->id]) }}">{{ $post->title }}</a></td>
									<td class="forum-user">
										<!-- TODO: UserProfileUrl --><a href="{{ route('user', ['user_id' =>  $post->user->id]) }}">{{ $post->user->name }}</a></td>
									<td class="forum-comments-count text-muted" style="width: 150px;"><i class="fa fa-comments-o"></i>
										<!-- TODO: CommentCount -->5 reacties</td>
									<td class="forum-comments-date text-muted" style="width: 300px;"> @if($post->updated_at != $post->created_at)
										Laatste reactie: {{ $post->updated_at->diffForHumans() }} <!-- TODO: Dit doet het niet! -->
										@endif</td>

									@if(auth()->user()->hasWorkgroupRole('intern') || $post->user->id == auth()->user()->id )

									<td class="iw-icon-cell">
										<button class="btn btn-default" title="Bewerken"><i class="fa fa-pencil"></i><span class="sr-only">Bewerken</span></button>
									</td>
									<td class="iw-icon-cell">
										<button class="btn btn-default" title="Verwijderen"><i class="fa fa-trash"></i><span class="sr-only">Verwijderen</span></button></td>

									@else
									<!-- Empty <td> tags to keep the columns aligned -->
									<td></td>
									<td></td>
									@endif

									@if(auth()->user()->hasWorkgroupRole('intern'))


									<td class="iw-icon-cell">
										<button class="btn btn-default" title="Sticky"><i class="fa  fa-thumb-tack"></i><span class="sr-only">Maak sticky</span></button></td>

									<td class="iw-icon-cell">
										<button class="btn btn-default" title="Sluiten"><i class="fa fa-lock"></i><span class="sr-only">Sluiten</span></button></td>

									@endif



								</tr>

								@endif
								@empty
								<p>Geen berichten op het forum</p>
								@endforelse
							</tbody>
						</table>
						<!-- /.table -->
					</div>
					<!-- /.mail-box-messages -->
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
					<div class="forum-controls">
						<div class="pull-right">
							1-50/200
							<div class="btn-group">
								<button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
								<button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
							</div>
							<!-- /.btn-group -->
						</div>
						<!-- /.pull-right -->
					</div>
				</div>
			</div>
			<!-- /. box -->
		</div>
		<!-- /.col -->

		<div class="col-md-3">
			<button class="btn btn-primary btn-block margin-bottom toggle" data-target="forum-post">Nieuw bericht</button>

			<!-- /.box -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
</section>
<!-- /.content -->

@endsection
