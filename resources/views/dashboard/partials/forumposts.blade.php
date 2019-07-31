<div class="card">
    <header class="card-header">
        <p class="card-header-title">
            <a class="has-text-dark" href="{{ route('forum') }}">Ongelezen forum posts</a>
        </p>
    </header>
    <div class="card-table">
        <div class="content">
            <table class="table is-fullwidth is-narrow">
                @forelse($forumPosts as $post)
                        <tr class="message-row" data-target="{{ route('forum-posts', ['forum_id' => $post->id]) }}">
                            <td class="has-text-centered"> <i class="fa fa-comments"></i> </td>
                            <td class="has-text-centered"> {{ $post->title }} </td>
                        </tr>
                @empty
                    <td>Geen (nieuwe) forum posts</td>
                @endforelse
            </table>
        </div>
    </div>
    @if(method_exists($forumPosts, 'links'))
        <footer class="card-footer" style="display: block; padding: 1em;">
            {{ $forumPosts->links('vendor.pagination.bulma', ['bulmaClasses' => 'is-small is-left', 'next' => 'Volgende', 'previous' => 'Vorige']) }}
        </footer>
    @endif
</div>
