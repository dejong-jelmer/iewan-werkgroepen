<div id="forum-post" class="box" style="display: none;">
    <article class="media">
        <div class="media-content">
            <div class="content">
                <form action="{{ route('forum-post-create') }}" method="POST">
                    @csrf
                    <div class="field">
                        <label class="label">Titel</label>
                        <div class="control">
                            <input name="title" class="input" type="text" placeholder="Text input">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Tekst</label>
                        <div class="control">
                            <textarea name="body" class="textarea editor" placeholder="Schrijf nieuw een forum bericht..."></textarea>
                        </div>
                    </div>
                    <div class="field is-grouped">
                        <div class="control">
                            <button type="submit" class="button is-link">Plaats</button>
                        </div>
                        <div class="control">
                            <button onclick="event.preventDefault();" class="button is-text toggle-forumpost-field">Annuleren</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </article>
</div>
