			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title"><a class="has-text-dark" href="{{ route('forum') }}">Ongelezen forum posts</a></h3>

				</div>




				<div class="box-body no-padding">

					<div class="table-responsive forum-messages">
						<table class="table table-hover table-striped">
							<tbody>
								@forelse($forumPosts as $post)
								<tr>
									<!-- TODO: .new message class -->
									<td class="forum-alert text-yellow" style="width: 30px;"><i class="fa fa-comment-o"></i></td>
									<td class="forum-date text-muted" style="width: 200px;">{{ $post->created_at->diffForHumans() }}</td>
									<td class="forum-subject"><a href="{{ route('forum-posts', ['post_id' => $post->id]) }}">{{ $post->title }}</a></td>
									<td class="forum-user">
										<!-- TODO: UserProfileUrl --><a href="#">{{ $post->user->id }}</a></td>
									<td class="forum-comments-count text-muted" style="width: 150px;"><i class="fa fa-comments-o"></i>
										<!-- TODO: CommentCount -->5 reacties</td>
									<td class="forum-comments-date text-muted" style="width: 300px;"> @if($post->updated_at != $post->created_at)
										Laatste reactie: {{ $post->updated_at->diffForHumans() }} <!-- TODO: Dit doet het niet! -->
										@endif</td>
								</tr>

								@empty
								<td>Geen (nieuwe) forum posts</td>
								@endforelse

							</tbody>
						</table>
						<!-- /.table -->
					</div>
					<!-- /.mail-box-messages -->
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
					@if(method_exists($forumPosts, 'links'))
					{{ $forumPosts->links('vendor.pagination.bulma', ['bulmaClasses' => 'is-small is-left', 'next' => 'Volgende', 'previous' => 'Vorige']) }}
					@endif


				</div>
			</div>
			<!-- /. box -->
