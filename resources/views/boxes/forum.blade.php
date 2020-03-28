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
										<a href="{{ route('user', ['user_name' => $post->user->name]) }}">{{ ucfirst($post->user->name) }}</a></td>
									<td class="forum-comments-count text-muted" style="width: 150px;">
                                        @if($post->responses()->count() > 0)
                                            <i class="fa fa-comments-o"></i>
										  {{ $post->responses()->count() }} reacties
                                         @endif
                                    </td>
									<td class="forum-comments-date text-muted" style="width: 300px;"> @if($post->updated_at != $post->created_at)
										Laatste reactie: {{ $post->updated_at->diffForHumans() }}
										@endif</td>
								</tr>

								@empty
                                <td class="padding-md">Geen nieuwe forumberichten</td>
								@endforelse

							</tbody>
						</table>
						<!-- /.table -->
					</div>
					<!-- /.mail-box-messages -->
				</div>
				<!-- /.box-body -->
				<div class="box-footer">

					<a href="{{ route('forum') }}" class="btn btn-default">Ga naar het forum</a>

				</div>
			</div>
			<!-- /. box -->
