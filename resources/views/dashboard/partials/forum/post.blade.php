
        @if(!empty($post))
                                        <tr>
                    <td class="forum-alert text-yellow" style="width: 30px;"><i class="fa fa-comment-o"></i></td>
                    <td class="forum-date text-muted" style="width: 200px;">{{ $post->created_at->diffForHumans() }}</td>
                    <td class="forum-subject"><a href="{{ route('forum-posts', ['post_id' => $post->id]) }}">{{ $post->title }}</a></td>
                      <td class="forum-user"><a href="#">{{ $post->user->name }}</a></td>
                    <td class="forum-comments-count text-muted" style="width: 100px;"><i class="fa fa-comments-o"></i> 5 reacties</td>
                    <td class="forum-comments-date text-muted" style="width: 200px;">                @if($post->updated_at != $post->created_at)
                    Laatste reactie: {{ $post->updated_at->diffForHumans() }}
                @endif</td>
                  </tr>

        @endif
    
