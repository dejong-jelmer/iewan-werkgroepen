@extends('templates.layout')
@section('title') @isset($user) profiel - {{ $user->name }} @endisset @endsection
@section('content')
<form action="{{ route('user-profile-post') }}" method="POST" enctype="multipart/form-data">
	@csrf

	<section class="content-header">
		<h1>Mijn profiel</h1>
	</section>


	<section class="content">

		<div class="box box-primary">

			<div class="box-header with-border">
				<h3 class="box-title">Contactgegevens</h3>
			</div>
			<!-- /.box-header -->

			<div class="row">
				<!-- left column -->
				<div class="col-md-8">
					<!-- general form elements -->
					<!-- form start -->
					<div class="box-body">

						<div class="form-group">
							<label>Naam</label>
							<input type="text" class="form-control" value="{{ $user->name }}" placeholder="Vul je naam in" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">E-mailadres</label>
							<input type="email" class="form-control" id="exampleInputEmail1" value="{{ $user->email }}" placeholder="Vul je E-mailadres in" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
						</div>

						<div class="form-group">
							<label>Telefoonnummer</label>
							<input type="text" class="form-control" value="{{ $user->telephone }}" placeholder="Vul je telefoonnummer in" autocomplete="off" style="">
						</div>


						<form role="form">
							<div class="form-group">
								<button type="submit" class="btn btn-primary">Opslaan</button>
							</div>
						</form>

					</div>
					<!-- /.box-body -->

				</div>
				<!--/.col (left) -->


				<div class="col-md-4">
					<div class="form-group">
						<img id="profile-image" src="{{ Storage::url($user->photo) }}{{-- https://i.pravatar.cc/400?u={{$user->id}} --}}" alt="User Avatar" class="w-100" width="100%">
					</div>

					<div class="form-group">
						<input type="button" class="input-file btn btn-primary" value="Upload een foto" onclick="$(this).next().trigger('click')">
                        <input class="file-input" type="file" name="profile_picture" style="display: none">

						<button type="" class="btn btn-warning pull-right">Verwijder foto</button>
					</div>

				</div>
				<!--/.col (right) -->

			</div>
			<!-- /.row -->

		</div>
		<!-- /.box -->

	</section>





	{{-- <div class="columns first-element">
        <div class="column is-6">
            <div class="card">
                <div class="card-image">
                    <figure class="image is-3by2">
                        <img id="profile-image" src="{{ asset("$fileUrl") }}" alt="{{ $fileUrl }}">
                    </figure>
                </div>
            </div>
        </div>
        <div class="column is-6">
            <div class="field">
                <label class="label">Naam</label>
                <div class="control @if($errors->count()) is-hidden @endif">
                    <p>{{ $user->name }}</p>
                </div>
                <div class="control has-icons-left  profile-field @if(!$errors->count()) is-hidden @endif">
                    <span class="icon is-small is-left">
                        <i class="fas fa-user"></i>
                    </span>
                    <input name="name" class="input @if($errors->has('name')) is-danger @endif" type="text" placeholder="{{ $user->name }}">
                    @if($errors->has('name'))
                        <p class="has-text-danger">{{ $errors->first('name') }}</p>
                    @endif
                </div>
            </div>
            <div class="field">
                <label class="label">Emailadres</label>
                <div class="control @if($errors->count()) is-hidden @endif">
                    <p>{{ $user->email }}</p>
                </div>
                <div class="control has-icons-left profile-field @if(!$errors->count()) is-hidden @endif">
                    <span class="icon is-small is-left">
                        <i class="fas fa-envelope"></i>
                    </span>
                    <input class="input" type="email" placeholder="{{ $user->email }}">
                    @if($errors->has('email'))
                        <p class="has-text-danger">{{ $errors->first('email') }}</p>
                    @endif
                </div>
            </div>
            <div class="field">
                <label class="label">Telefoon</label>
                <div class="control @if($errors->count()) is-hidden @endif">
                    <p>{{ $user->telephone }}</p>
                </div>
                <div class="control has-icons-left profile-field @if(!$errors->count()) is-hidden @endif">
                    <span class="icon is-small is-left">
                        <i class="fas fa-phone"></i>
                    </span>
                    <input class="input" type="text" placeholder="{{ $user->telephone }}">
                    @if($errors->has('telephone'))
                        <p class="has-text-danger">{{ $errors->first('telephone') }}</p>
                    @endif
                </div>
            </div>
            <div class="field">
                <div class="file has-name @if(!$errors->count()) is-hidden @endif profile-field">
                    <label class="file-label">
                        <input class="file-input" type="file" name="profile_picture">
                        <span class="file-cta">
                            <span class="file-icon">
                                <i class="fas fa-upload"></i>
                            </span>
                            <span class="file-label">
                                Upload foto
                            </span>
                        </span>
                        <span class="file-name">
                        </span>
                    </label>
                    @if($errors->has('profile-picture'))
                        <p class="has-text-danger">{{ $errors->first('profile-picture') }}</p>
                    @endif
                </div>
            </div>
            <div class="columns">
                <div class="column is-6">
                    <div class="control">
                        <a id="toggle-edit-profile" class="button is-primary prevent-default @if($errors->count()) is-hidden @endif">Aanpassen</a>
                    </div>
                </div>
                <div class="column is-6">
                    <div class="control is-pulled-right">
                        <button class="button is-success @if(!$errors->count()) is-hidden @endif profile-field">Opslaan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
 --}}
</form>
@endsection
