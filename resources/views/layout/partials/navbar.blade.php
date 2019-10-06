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
			<span class="sr-only">Toggle navigation</span>
		</a>
		<!-- Navbar Right Menu -->

		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
<!-- TODO: Notifications werken dus nog niet -->
				<!-- Notifications: style can be found in dropdown.less -->
				<li class="dropdown notifications-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-bell-o"></i>
                        {{-- @todo: heeft nog geen reacties op forumberichten komt nog --}}
						<span class="label label-warning">{{ auth()->user()->notifications() }}</span>
					</a>
					<ul class="dropdown-menu">
                        {{-- @todo: heeft nog geen reacties op forumberichten komt nog --}}
						<li class="header">Je hebt {{ auth()->user()->notifications() }} meldingen</li>
						<li>
							<!-- inner menu: contains the actual data -->
							<ul class="menu">
                                {{-- @todo: newForumPostReplies() needs to be build --}}
                                @if(auth()->user()->newForumPostReplies())
    								<li>
    									<a href="#">
    										<i class="fa fa-comments text-aqua"></i> {{ auth()->user()->newForumPostReplies() }} reacties op je forumbericht
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

							</ul>
						</li>
					</ul>
				</li>

			<!-- TODO: UserAvatar -->
				<!-- User Account: style can be found in dropdown.less -->
				<li class="user user-menu">
					<a href="{{ route('profile') }}">
						<img src="/AdminLTE/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">

						<span class="hidden-xs">{{ auth()->user()->name }}</span>
					</a>

				</li>

<!-- TODO: Button stylen -->
				<li class="user user-menu">
					<form action="{{ route('logout') }}" method="POST">
						@csrf
						<button type="submit" class="btn btn-link logout " title="Log uit">
							<i class="fa fa-sign-out text-mute"></i>
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
