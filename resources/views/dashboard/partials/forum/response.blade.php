<article class="media" id="response-to-{{ $post->id }}">
    <figure class="media-left">
        <p class="image is-64x64">
            <img src="https://bulma.io/images/placeholders/128x128.png">
        </p>
     </figure>
     <div class="media-content">
        <form action="{{ route('user-forum-respone', [
            'post_id' => $post->id
            ]) }}" method="POST">
            @csrf
            <div class="field">
                <p class="control">
                    <textarea name="body" class="textarea" placeholder="Schrijf een bericht..."></textarea>
                </p>
            </div>
            <nav class="level">
                <div class="level-left">
                    <div class="level-item">
                        <button type="submit" class="button is-info">Verstuur</button>
                    </div>
                </div>
             </nav>
          </form>
      </div>
  </article>
