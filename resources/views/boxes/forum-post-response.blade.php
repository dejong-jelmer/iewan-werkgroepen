<div  id="response-to-{{ $post->id }}" class="box box-primary">
	<div class="box-header with-border primary">
		<h3 class="box-title">Reageer</h3>

		<!-- TODO: ForumPagination -->
		<div class="box-tools pull-right">


		</div>
		<!-- /.box-tools -->
	</div>
	<!-- /.box-header -->
        <form action="{{ route('user-forum-respone', [
            'post_id' => $post->id
            ]) }}" method="POST">		@csrf
		<div class="box-body">

			<div class="field">
				<label class="label">Tekst</label>
				<div class="control">
					<textarea name="body" class="textarea editor" placeholder="Schrijf nieuw een forum bericht..."></textarea>
				</div>
			</div>

		</div>
		<div class="box-footer">
			<div class="pull-right">
				<div class="control">
					<button type="submit" class="btn btn-primary">Reageer</button>
				</div>
			</div>
		</div>
	</form>

</div>