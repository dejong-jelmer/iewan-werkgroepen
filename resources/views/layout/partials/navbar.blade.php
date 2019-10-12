<header class="main-header">

	<!-- Logo -->
	<a href="{{ route('dashboard') }}" class="logo">
		<img src="{{ asset('img/Iewan-logo-kleur-op-wit-300x300.jpg') }}" alt="iewan" height="30" width="30">
		<strong>Werkgroepen</strong>
	</a>

	<!-- Header Navbar -->
	<nav class="navbar navbar-static-top" role="navigation">
		<!-- Sidebar toggle button-->
		<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
			<span class="sr-only">Menu in- en uitklappen</span>
		</a>
		<!-- Navbar Right Menu -->

		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
				<!-- Notifications: style can be found in dropdown.less -->
				<li class="dropdown notifications-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						@if(!empty(auth()->user()->notifications()))
						<i class="fa fa-bell"></i>
						<span class="label label-warning">{{ auth()->user()->notifications() }}</span>
						@else
						<i class="fa fa-bell-o"></i>
						@endif
					</a>
					<ul class="dropdown-menu">
						<li class="header">Je hebt {{ auth()->user()->notifications() == 0 ? 'geen' : auth()->user()->notifications() }} meldingen</li>
						<li>
							<!-- inner menu: contains the actual data -->
							<ul class="menu">
								@if(auth()->user()->newPostResponses())
								<li>
									<a href="{{ route('forum') }}">
										<i class="fa fa-comments text-aqua"></i> {{ auth()->user()->newPostResponses() }} reacties op je forumbericht
									</a>
								</li>
								@endif
								@if(auth()->user()->newBinderForms() > 0)
								<li>
									<a href="#">
										<i class="fa fa-address-book text-yellow"></i> {{ auth()->user()->newBinderForms() }} nieuwe klapperinschrijvingen
									</a>
								</li>
								@endif
								@if(auth()->user()->newWorkgroupApplications() > 0)
								<li>
									<a href="#">
										<i class="fa fa-coffee text-red"></i> {{ auth()->user()->newWorkgroupApplications() }} werkgroep aanmelding
									</a>
								</li>
								@endif

								@foreach(auth()->user()->workgroups as $workgroup)
								@if($workgroup->numberOfApplicants() == 1)
								<li>
									<a href="{{ route('workgroup', ['workgroup_id' => $workgroup->name]) }}">
										<i class="fa fa-clipboard text-green"></i>
										{{ $workgroup->numberOfApplicants() }} {{ $workgroup->name }} aanmelding
									</a>
								</li>

								@elseif($workgroup->numberOfApplicants() >= 2)
								<li>
									<a href="{{ route('workgroup', ['workgroup_id' => $workgroup->name]) }}">
										<i class="fa fa-clipboard text-green"></i>
										{{ $workgroup->numberOfApplicants() }} {{ $workgroup->name }} aanmeldingen
									</a>
								</li>
								@endif

								@endforeach


							</ul>
						</li>
					</ul>
				</li>

				<!-- TODO: UserAvatar -->
				<!-- User Account: style can be found in dropdown.less -->
				<li class="user user-menu">
					<a href="{{ route('profile') }}">
						<img src="{{ !empty(auth()->user()->photo) ? Storage::url(auth()->user()->photo) : asset('img/empty-avatar.jpg') }}" class="user-image" alt="User Image">

						<span class="hidden-xs">{{ ucfirst(auth()->user()->name) }}</span>
					</a>

				</li>

				<!-- TODO: Button stylen -->
				<li class="user user-menu">
					<form action="{{ route('logout') }}" method="POST">
						@csrf
						<button type="submit" class="btn btn-link logout " title="Log uit">
							<i class="fa fa-sign-out"></i>
							<span class="sr-only">Log uit</span>
						</button>
					</form>

				</li>




				<!-- Control Sidebar Toggle Button -->
				<!-- TODO: Gaan we vast niet gebruiken.
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
-->
			</ul>
		</div>
	</nav>
</header>
