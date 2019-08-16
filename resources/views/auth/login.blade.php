@extends('templates.layout')
@section('title') Login @endsection
@section('content')


<section class="content">

	<div class="row">
		<div class="col-md-4 col-md-offset-4">

			<div class="box">
				<div class="box-header with-border text-center">
					<img src="{{ asset('img/Iewan-logo-kleur-op-wit-300x300.jpg') }}" alt="iewan" class="logo">
					<h1 class="box-title sr-only">Werkgroepensite</h1>

					<div class="box-tools pull-right">


					</div>
				</div>
				<!-- /.box-header -->



				<div class="box-body">

					<form action="{{ route('login') }}" method="POST">
						@csrf
						<div class="field">
							<label for="email">Email:</label>
							<div class="control input-group">
								<span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>
								<input type="email" name="email" class="input form-control input-lg" id="email"> </div>
						</div>
						<div class="field">
							<label for="pwd">Wachtwoord:</label>
							<div class="control input-group">
								<span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span>
								<input type="password" name="password" class="input form-control input-lg" id="pwd"> </div>
						</div>
						<div class="field">
							<div class="control">
								<button type="submit" class="btn btn-primary pull-right">Login</button>
							</div>
						</div>
					</form>






				</div>
				<!-- /.box-body -->
				<div class="box-footer text-center">

					<a href="#">Wachtwoord vergeten?</a>
				</div>
				<!-- /.box-footer -->
			</div>

		</div>

	</div>

</section>




@endsection


@section('style')
.content-wrapper, .main-footer{
margin-left: 0
}
@endsection
