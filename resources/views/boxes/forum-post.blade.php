@if(!empty($post))

<div class="box-header">
	<div class="user-block">
		<!-- TODO UserAvatar -->
		<img class="img-circle" src="{{ !empty($post->user->avatar) ? Storage::url($post->user->avatar) : asset('img/empty-avatar.jpg') }}" alt="User Image">
		<span class="username">
			<a href="{{ route('user', ['user_name' =>  $post->user->name]) }}">{{ ucfirst($post->user->name) }}</a>
		</span>
		<span class="description">{{ $post->created_at->diffForHumans() }}</span>
	</div>
	<div class="box-tools pull-right">
		<div class="btn-group">

			@if(Gate::allows('edit-post', $post))
    			<button onclick="$('#edit_'+{{ $post->id }}+', #body_'+{{ $post->id }}).toggleClass('hidden');" class="btn btn-default" title="Bewerken"><i class="fa fa-pencil"></i><span class="sr-only">Bewerken</span></button>
			@endif
            @if(Gate::allows('delete-post', $post))
    			<a href="{{route('delete-post', ['post_id' => $post->id]) }}" class="btn btn-default" title="Verwijderen"><i class="fa fa-trash"></i><span class="sr-only">Verwijderen</span></a>
			@endif
            {{-- @todo: niet helemaal duidelijk wat sticky moet doen en wie dat wel/niet mag --}}
            <button class="btn btn-default" title="Sticky"><i class="fa  fa-thumb-tack"></i><span class="sr-only">Maak sticky</span></button>

			@if(Gate::allows('close-post', $post))
    			<button class="btn btn-default" title="Sluiten"><i class="fa fa-lock"></i><span class="sr-only">Sluiten</span></button>
			@endif

		</div>
	</div>

</div>
<div class="box-body">
    @if(auth()->user()->hasWorkgroupRole('intern') || auth()->user()->id == $post->user->id)
	   <div id="edit_{{ $post->id }}" class="post @if(empty($edit)) hidden @endif">
        <form action="{{ route('edit-post', ['post_id' => $post->id]) }}" method="POST">
            @csrf
            <div class="form-group">
                <textarea name="body" class="textarea editor" placeholder="Schrijf nieuw een forum bericht..." row="6">@if(!empty($post->body)) {!! html_entity_decode($post->body) !!} @endif</textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Plaats</button>
            </div>
        </form>
    	</div>
    @endif
		<div id="body_{{ $post->id }}" class="@if(!empty($edit)) hidden @endif">
			@if(!empty($post->body))
                {!! html_entity_decode($post->body) !!}
			@endif
		</div>
	<!-- /.post -->

</div>
<!-- /.box-body -->
<div class="box-footer">

</div>
<!-- /.box-footer-->


@endif

