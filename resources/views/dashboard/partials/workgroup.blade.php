			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title"><a href="{{ route('workgroup', ['workgroup_id' => $workgroup->id]) }}">{{ $workgroup->name }}</a></h3>

					<div class="box-tools pull-right">

						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

					</div>
				</div>
				<!-- /.box-header -->


				<div class="box-body">
					<p>Wat komt er dan in deze boxes?</p>

					@if($workgroup->hasRole('aanname'))
					<div class="column">
						<a href="#">
							<i class="fa fa-address-book is-size-4 @if($workgroup->unReleasedForms()->count()) badge @endif" data-count="{{ $workgroup->unReleasedForms()->count() }}"></i>
						</a>
					</div>
					@endif
				</div>
				<!-- /.box-body -->
				<div class="box-footer">

				</div>
				<!-- /.box-footer -->

			</div>
