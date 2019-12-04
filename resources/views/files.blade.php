<!--
TODO: Bestanden route
------------------------->


@extends('layout.layout')
@section('title') Bestanden @endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Bestanden
	</h1>
</section>


<!-- Main content -->
<section class="content">

	<div class="row">

		<div class="col-md-12">
            @boxes('FilesOverview', ['workgroups' => $workgroups])
			{{-- @include('boxes.files-overview') --}}

		</div>
	</div>


</section>
{{-- @push('script-partials')
    <script>
        new Vue({
            el: '#app',
            data: {
                files: files
            }
        });
    </script>
@endpush --}}
<!-- /.content -->
<!-- /.content-wrapper -->

@endsection
