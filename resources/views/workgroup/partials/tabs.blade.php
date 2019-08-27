<!--
TODO: Whole tabs function
------------------------->


	<div class="nav-tabs-custom">

	<ul class="nav nav-tabs">
		<li class="active"><a href="#algemeen" data-toggle="tab">Algemeen</a></li>
		<li><a href="#activiteiten" data-toggle="tab">Activiteiten</a></li>
		@if(auth()->user()->inWorkgroup($workgroup->id))
		<li><a href="#addtab" data-toggle="tab"><i class="fa fa-plus-square-o"></i><span class="sr-only">Nieuw tabblad</span></a></li>
		@endif
	</ul>

	<div class="tab-content">

		<!-- Tab-pane -->
		<div class="active tab-pane" id="algemeen">
			<!-- box-header -->
			<div class="box-header">
				<h3 class="box-title">Informatie</h3>
				@if(auth()->user()->inWorkgroup($workgroup->id))
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="editor">
						<i class="fa fa-pencil"></i><span class="sr-only">Bewerk tabblad</span>
					</button>
					<button type="button" class="btn btn-box-tool" data-widget="editor">
						<i class="fa fa-trash"><span class="sr-only">Verwijder tabblad"</span></i>
					</button>
				</div>
				@endif
			</div>
			<!-- /.box-header -->

			<!-- box-body -->
			<div class="box-body">
				Hier komt werkgroep tekst
			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.tab-pane -->

		<!-- Tab-pane -->
		<div class="tab-pane" id="activiteiten">
			<!-- box-header -->
			<div class="box-header">
				<h3 class="box-title">Activiteiten</h3>
				@if(auth()->user()->inWorkgroup($workgroup->id))
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="editor">
						<i class="fa fa-pencil"></i><span class="sr-only">Bewerk tabblad</span>
					</button>
					<button type="button" class="btn btn-box-tool" data-widget="editor">
						<i class="fa fa-trash"><span class="sr-only">Verwijder tabblad"</span></i>
					</button>
				</div>
				@endif
			</div>
			<!-- /.box-header -->

			<!-- box-body -->
			<div class="box-body">
				Hier komt werkgroep tekst
			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.tab-pane -->

		<!-- Add Tab -->

		@if(auth()->user()->inWorkgroup($workgroup->id))
		<!-- Tab-pane -->
		<div class="tab-pane" id="addtab">
			<form>
				<!-- box-header -->
				<div class="box-header">
					<div class="form-group">
						<label class="sr-only">Titel van het tablad</label>
						<input class="form-control" type="text" placeholder="Titel">
					</div>
				</div>
				<!-- box-body -->
				<div class="box-body">
					<div class="form-group">
						<label class="sr-only">Inhoud van het tablad</label>
						<textarea class="form-control" rows="5"></textarea>

					</div>
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
					<div class="box-tools pull-right">
						<div class="form-group">
							<button class="btn btn-primary" type="submit">Opslaan</button>
						</div>
					</div>
				</div>
				<!-- /.box-footer-->
			</form>
		</div>
		<!-- /.tab-pane -->
		@endif





	</div>
	<!-- /.tab-content -->
</div>
<!-- /.nav-tabs-custom -->
