@extends('layout.layout')
@section('title') @isset($user) {{ $user->name }} @endisset @endsection
@section('content')
{{ dd('deze gebruiken we niet') }}
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>{{ ucfirst($user->name) }}</h1>

</section>
<!-- / Conten Header -->

<!-- Main content -->
<section class="content">
@if(Gate::allows('edit-profile', $user))
    <form id="form" action="{{ route('edit-user', ['user_name' => $user->name]) }}" method="POST" enctype="multipart/form-data">
    @csrf
@endif
	<div class="row">
		<div class="col-md-4">

			<div class="box">

				<div class="box-body">
					<img id="avatar" src="{{ loadAvatar($user) }}" alt="avatar" class="w-100" width="100%"
                        @if(auth()->user()->id == $user->id)
                            onclick="$(this).next().trigger('click')
                        @endif
                    ">
                    @if(Gate::allows('edit-profile', $user))
                        <input class="upload-avatar" type="file" name="avatar" style="display: none">
                    @endif
				</div>
				<!-- /.box-body -->

			</div>

		</div>
		<!-- /.col -->
		<div class="col-md-3">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Contact</h3>
                    @if(Gate::allows('edit-profile', $user))
                    <div class="form-group">
                        <button onclick="event.preventDefault(); $('.non-edit-profile, .edit-profile').toggleClass('hidden')" class="btn btn-default pull-right prevent-default" title="Bewerken"><i class="fa fa-pencil"></i><span class="sr-only">Bewerken</span></button>
                        <button onclick="$('#form').submit()" class="btn btn-success pull-right edit-profile hidden" title="Accepteren"><i class="fa fa-check"></i><span class="sr-only">Aanpassen</span></button>
                    </div>
                    @endif
    {{-- {{ dump($errors) }} --}}

					<div class="box-tools pull-right">
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
                     @if(Gate::allows('edit-profile', $user))
                         <div class="form-group edit-user hidden">
                            <label for="email" class="pull-left">Email</label> <input name="email" type="email" class="form-control pull-right" value="{{ $user->email }}">
                        </div>
                         <div class="form-group edit-user hidden">
                            <label for="emial" class="pull-left">Telefoon</label> <input name="telephone" type="text" class="form-control pull-right" value="{{ $user->telephone }}">
                        </div>
                    @endif
					<ul class="list-group list-group-unbordered non-edit-user">
						<li class="list-group-item">
							<b>Email</b> <a href="mailto:{{ ucfirst($user->email) }}" class="pull-right">{{ $user->email }}</a>
						</li>
                        <li class="list-group-item  hidden">

                        </li>
						<li class="list-group-item">
							<b>Telefoon</b> <a href="tel:{{ ucfirst($user->telephone) }}" class="pull-right">{{ ucfirst($user->telephone) }}</a>
						</li>
                        <li class="list-group-item  hidden">

                        </li>



					</ul>
				</div>
				<!-- /.box-body -->
				<div class="box-footer text-center">

				</div>
				<!-- /.box-footer -->
			</div>

			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Werkgroepen</h3>
					<div class="box-tools pull-right">
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">

					@forelse($user->workgroups as $workgroup)
					<a href="{{ route('workgroup', ['workgroup_name' => $workgroup->name]) }}" class="label label-default">{{ $workgroup->name }}</a>
					@empty
					<span>{{$user->name}} zit nog niet in een werkgroep</span>
					@endforelse
				</div>
				<!-- /.box-body -->
				<div class="box-footer text-center">

				</div>
				<!-- /.box-footer -->
			</div>
		</div>



	</div>

	<div class="row">
		<div class="col-md-7">

			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Over mij</h3>

					<div class="box-tools pull-right">

					</div>
				</div>
				<!-- /.box-header -->

				<div class="box-body">
                    <p>{{ $user->bio }}</p>
                    @if(Gate::allows('edit-profile', $user))
                        <div class="edit-profile hidden">
                            <textarea id="bio" name="bio" class="editor" cols="30" rows="10">{{ $user->bio }}</textarea>
                        </div>
                    @endif
				</div>
				<!-- /.box-body -->
				<div class="box-footer text-center">

				</div>
				<!-- /.box-footer -->
			</div>




		</div>



	</div>
@if(Gate::allows('edit-profile', $user))
    </form>
@endif
</section>


@endsection
