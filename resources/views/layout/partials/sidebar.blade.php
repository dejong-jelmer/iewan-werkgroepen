@if(auth()->check())

<aside class="main-sidebar">

	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">

		<!-- Sidebar Menu -->
		<ul class="sidebar-menu" data-widget="tree">

			<li class="{{ Request::route()->getName() == 'dashboard' ? 'active' : '' }}">
				<a href="{{ route('dashboard') }}"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a>
			</li>

			<!-- werkgroepen -->
			<li class="treeview {{ Request::route()->getName() == 'workgroup' ? 'active menu-open' : '' }}">
				<a href="#"><i class="fa fa-clipboard"></i> <span>Werkgroepen</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">

					<!-- eerst de werkgroepen waar de gebruiker in zit: -->
					@foreach(auth()->user()->activeWorkgroups as $workgroup)
					<li class="{{ Request::segment(2) == $workgroup->name ? 'active' : '' }}"><a href="{{ route('workgroup', ['workgroup' => $workgroup->name]) }}"><i class="fa @if(auth()->user()->inWorkgroup($workgroup->id)) fa-circle @else fa-circle-o @endif"></i>{{ ucfirst($workgroup->name)  }}</a></li>
					@endforeach

					<!-- dan de overige werkgroepen: -->
					@isset($workgroups)
					@foreach($workgroups as $workgroup)
					@if(!auth()->user()->inWorkgroup($workgroup->id))
					<li class="{{ Request::segment(2) == $workgroup->name ? 'active' : '' }}"><a href="{{ route('workgroup', ['workgroup' => $workgroup->name]) }}"><i class="fa @if(auth()->user()->inWorkgroup($workgroup->id)) fa-circle @else fa-circle-o @endif"></i>{{ ucfirst($workgroup->name)  }}</a></li>
					@endif
					@endforeach

					<li><a href="{{ route('new-workgroup') }}"><i class="fa fa-plus-circle"></i> Nieuwe werkgroep</a></li>
					@endisset

				</ul>
			</li>

			<!-- bewoners -->
			<li class="{{ Request::route()->getName() == 'users' ? 'active' : '' }}">
				<a href="{{ route('users') }}"><i class="fa fa-users"></i> <span>Bewoners</span></a>
			</li>

			<!-- klapper -->
			<li class="{{ Request::route()->getName() == 'binder-forms' ? 'active' : '' }}">
				<a href="{{ route('binder') }}">
					<i class="fa fa-address-book"></i> <span>Klapper</span>
					<span class="pull-right-container">
						@if(auth()->user()->newBinderForms())
						<small class="label pull-right bg-green">{{ auth()->user()->newBinderForms() }}</small>
						@endif
					</span>
				</a>
			</li>

			<!-- Forum -->
			<li class="{{ Request::route()->getName() == 'forum' ? 'active' : '' }}">
				<a href="{{ route('forum') }}">
					<i class="fa fa-comments"></i> <span>Forum</span>
					<span class="pull-right-container">
						@if(auth()->user()->newForumPosts())
						<small class="label pull-right bg-green">{{ auth()->user()->newForumPosts() }}</small>
						@endif
						@if(auth()->user()->newPostResponses())
						<small class="label pull-right bg-orange">{{ auth()->user()->newPostResponses() }}</small>
						@endif
					</span>
				</a>
			</li>

			<!-- Profiel -->
			<li class="{{ Request::route()->getName() == 'user' ? 'active' : '' }}">
				<a href="{{ route('user', ['user_name' => auth()->user()->name]) }}"><i class="fa fa-user"></i><span>Mijn profiel</span></a>
			</li>
			<!-- Files -->
			<li class="{{ Request::route()->getName() == 'files' ? 'active' : '' }}">
				<a href="{{ route('files') }}"><i class="fa fa-file"></i><span>Bestanden</span></a>
			</li>
		</ul>
		<!-- /.sidebar-menu -->
	</section>
	<!-- /.sidebar -->
</aside>
@endif
