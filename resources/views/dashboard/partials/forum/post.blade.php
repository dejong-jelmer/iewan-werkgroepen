<div class="box">
  <article class="media">
    <div class="media-left">
      <figure class="image is-64x64">
        <img src="https://bulma.io/images/placeholders/128x128.png" alt="Image">
      </figure>
    </div>
    <div class="media-content">
      <div class="content">
        @if(!empty($post))
            <p>
                <a class="form-post" href="{{ route('forum-posts', ['post_id' => $post->id]) }}"> {{ $post->title }}</a> <small>{{ $post->user->name }}</small>
                <br>
                <small>Gepost: {{ $post->created_at->diffForHumans() }}</small>
                <br>
                @if($post->updated_at != $post->created_at)
                    <small>Laatste reactie: {{ $post->updated_at->diffForHumans() }}</small>
                @endif
                @if(!empty($showBody))
                <br>
                {!! html_entity_decode($post->body) !!}
                @endif
            </p>
        @endif
      </div>
      @if(!empty($allowResponse))
          <nav class="level is-mobile">
              <div class="level-left">
                  <a class="level-item">
                      <span class="toggle-response-field icon is-small"><i class="fas fa-reply"></i></span>
                  </a>
              </div>
          </nav>
        @endif
    </div>
  </article>
</div>


