@extends('layout.layout')
@section('title') Klapper @endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Klapper
	</h1>
</section>


<!-- Main content -->
<section class="content">

	<div class="row">

		@if(auth()->user()->hasWorkgroupRole('aanname'))

		<div class="col-md-3 pull-right">
			<button class="btn btn-primary btn-block margin-bottom toggle" data-target="email-form">Stuur een nieuw formulier</button>

        
        @if(!$pending->isEmpty())
			<div class="box box-solid">
				<div class="box-header with-border">
					<h3 class="box-title">In afwachting</h3>

				</div>
				<div class="box-body">
					<ul class="list-group">
						@foreach($pending as $p)
						<li class="list-group-item"><strong>{{ $p->name }}</strong> <span class="text-muted pull-right">{{ $p->created_at->locale('nl')->isoFormat('D MMM YY') }}</span></li>
						
						@endforeach
					</ul>

				</div>
				<!-- /.box-body -->
			</div>
			<!-- /. box -->
@endif
			<!-- /.box -->
		</div>
		<!-- /.col -->

		<div class="col-md-9">

            @boxes('EmailForm')
			{{-- @include('boxes.email-form') --}}
            @boxes('Applications')
			{{-- @include('boxes.applications') --}}

			@else

			<div class="col-md-12">

				@endif

                @boxes('Veto')
				{{-- @include('boxes.veto') --}}

                @boxes('BinderList', ['binderForms' => $binderForms])
				{{-- @include('boxes.binder-list') --}}

			</div>


</section>


<!-- /.content -->
<!-- /.content-wrapper -->

@endsection
			@push('script-partials')
<script>


function copyURL(formID, formName) {
    
  var copyText = document.getElementById(formID);
  copyText.select();
  copyText.setSelectionRange(0, 99999);
  document.execCommand("copy");
    alert( "Link naar formulier van \"" + formName + "\" gekopieerd naar het klembord")
  

}


</script>


@endpush