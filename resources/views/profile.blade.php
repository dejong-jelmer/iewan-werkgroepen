@extends('layout.layout')
@section('title') @isset($user) profiel - {{ $user->name }} @endisset @endsection
@section('content')
@if(auth()->user()->hasWorkgroupRole('aanname') || auth()->user()->id == $user->id)
{{-- ingelogde user content
berwerk button voor editing van profiel
 --}}
<form action="{{ route('edit-user', ['user_name' => $user->name]) }}" method="POST" enctype="multipart/form-data">
	@csrf

	<section class="content-header">
		<h1>Bewerk profiel</h1>
	</section>






	<section class="content">

		<div class="row">
			<div class="col-md-3 pull-right">

				<div class="box">

					<div class="box-body form-group">

						<img id="profile-image" src="{{ !empty($user->avatar) ? Storage::url($user->avatar) : asset('img/empty-profile.jpg') }}" alt="Profielfoto" class="w-100" width="100%">
					</div>

					<div class="box-footer form-group">
						@if($user->avatar)


						<input type="button" class="input-file btn btn-primary" value="Upload een nieuwe foto" onclick="$(this).next().trigger('click')">
						<input class="file-input" type="file" name="profile_picture" style="display: none">

						<button type="submit" name="delete_profile_picture" class="btn btn-default pull-right"><i class="fa fa-trash"></i>Verwijder foto</button>
						@else
						<input type="button" class="input-file btn btn-primary" value="Upload een foto" onclick="$(this).next().trigger('click')">
						<input class="file-input" type="file" name="profile_picture" style="display: none">

						@endif
					</div>


					@if($errors->has('profile_picture'))
					<div class="text-danger">
						<small>{{ $errors->first('profile_picture') }}</small>
					</div>
					@endif

				</div>

			</div>
			<!-- /.col -->
			<div class="col-md-3">
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Contact</h3>

						<div class="box-tools pull-right">

						</div>
					</div>
					<!-- /.box-header -->

					<div class="box-body">
						<ul class="list-group list-group-unbordered">

							<li class="list-group-item form-group {{ $errors->has('name') ? 'has-error' : '' }}">
								<label for="name" class="control-label">Naam</label> <input type="text" class="form-control" name="name" value="{{ $user->name }}" placeholder="Vul je naam in" autocomplete="off">
								@if($errors->has('name'))
								<div class="text-danger">
									<small>{{ $errors->first('name') }}</small>
								</div>
								@endif
							</li>

							<li class="list-group-item form-group {{ $errors->has('email') ? 'has-error' : '' }}">
								<label for="email" class="control-label">Email</label> <input type="email" class="form-control" name="email" value="{{ $user->email }}" placeholder="Vul je email in" autocomplete="off">
								@if($errors->has('email'))
								<div class="text-danger">
									<small>{{ $errors->first('email') }}</small>
								</div>
								@endif
							</li>

							<li class="list-group-item form-group {{ $errors->has('telephone') ? 'has-error' : '' }}">
								<label for="telephone" class="control-label">Telefoon</label> <input type="numbers" class="form-control" name="telephone" value="{{ $user->telephone }}" placeholder="Vul je email in" autocomplete="off">
								@if($errors->has('telephone'))
								<div class="text-danger">
									<small>{{ $errors->first('telephone') }}</small>
								</div>
								@endif
							</li>



						</ul>
					</div>
				</div>


				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Wachtwoord</h3>

					</div>
					<!-- /.box-header -->

					<div id="newPassword" class="box-body">

						<button onclick="generatePassword()" class="btn btn-default" type="button">Nieuw wachtwoord</button>


					</div>
				</div>


				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Werkgroepen</h3>

						<div class="box-tools pull-right">


						</div>
					</div>
					<!-- /.box-header -->

					<div class="box-body">


						@foreach($user->workgroups as $workgroup)


						<button class="btn label-default btn-xs margin-bottom">
							<span class="sr-only">Verlaat </span>{{ $workgroup->name }} <i class="fa fa-trash"></i>
						</button>
						@endforeach
					</div>
					<!-- /.box-body -->
					<div class="box-footer text-center">

					</div>
					<!-- /.box-footer -->
				</div>
			</div>


			<div class="col-md-6">

				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Over mij</h3>


					</div>
					<!-- /.box-header -->

					<div class="box-body">
						<textarea name="body" class="textarea editor" placeholder="Schrijfwat over jezelf..." row="6"></textarea>
					</div>
					<!-- /.box-body -->
					<div class="box-footer text-center">

					</div>
					<!-- /.box-footer -->
				</div>




			</div>




		</div>

		<div class="row">
			<div class="col-xs-12  form-group">
				<button type="submit" class="btn btn-primary pull-right">Sla wijzigingen op</button>
			</div>
		</div>
	</section>

</form>


<script>
	function generatePassword() {

		var length = 28,
			charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+=/\|{}~?;:~€",
			retVal = "";
		for (var i = 0, n = charset.length; i < length; ++i) {
			retVal += charset.charAt(Math.floor(Math.random() * n));
		}

		var Password = retVal;

		document.getElementById("newPassword").innerHTML = '<div class="form-group"><input id="password" class="form-control" value="' + Password + '" type="password" name="password" autocomplete="off"></div><button class="btn btn-default" onclick="SeePassword()" type="button"><i id="eye" class="fa fa-eye"></i></button> <button onclick="cancelPassword()" class="btn btn-default" type="button">Annuleren</button>';
	}

	function SeePassword() {
		var password = document.getElementById("password");
		if (password.type === "password") {
			password.type = "text";
		} else {
			password.type = "password";
		}
		var icon = document.getElementById("eye");
		if (icon.className === "fa fa-eye") {
			icon.className = "fa fa-eye-slash";
		} else {
			icon.className = "fa fa-eye";
		}
	}

	function cancelPassword() {
		document.getElementById("newPassword").innerHTML = '<button onclick="generatePassword()" class="btn btn-default" type="button">Nieuw wachtwoord</Button>';
	}

</script>





@else
{{-- content voor de niet ingelogde user --}}

@endif
@endsection
