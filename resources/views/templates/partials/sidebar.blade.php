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
					@foreach(auth()->user()->workgroups as $workgroup)
					<li class="{{ Request::segment(2) == $workgroup->id ? 'active' : '' }}"><a href="{{ route('workgroup',['workgroup_id' =>  $workgroup->id]) }}"><i class="fa @if(auth()->user()->inWorkgroup($workgroup->id)) fa-circle @else fa-circle-o @endif"></i>{{ $workgroup->name  }}</a></li>
					@endforeach

					<!-- dan de overige werkgroepen: -->
					@isset($workgroups)
					@foreach($workgroups as $workgroup)
					@if(!auth()->user()->inWorkgroup($workgroup->id))
					<li class="{{ Request::segment(2) == $workgroup->id ? 'active' : '' }}"><a href="{{ route('workgroup',['workgroup_id' =>  $workgroup->id]) }}"><i class="fa @if(auth()->user()->inWorkgroup($workgroup->id)) fa-circle @else fa-circle-o @endif"></i>{{ $workgroup->name  }}</a></li>
					@endif
					@endforeach
					
					<li><a href="#"><i class="fa fa-plus-circle"></i> Nieuwe werkgroep</a></li>
					@endisset

				</ul>
			</li>

			<!-- bewoners -->
			<li class="{{ Request::route()->getName() == 'users' ? 'active' : '' }}">
				<a href="{{ route('users') }}"><i class="fa fa-users"></i> <span>Bewoners</span></a>
			</li>

			<!-- klapper -->
			<li class="{{ Request::route()->getName() == 'binder-forms' ? 'active' : '' }}">
				<a href="{{ route('binder-forms') }}">
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
					</span>
				</a>
			</li>

			<!-- Profiel -->
			<li class="{{ Request::route()->getName() == 'user-profile' ? 'active' : '' }}">
				<a href="{{ route('user-profile') }}"><i class="fa fa-user"></i><span>Mijn profiel</span></a>
			</li>

		</ul>
		<!-- /.sidebar-menu -->
	</section>
	<!-- /.sidebar -->
</aside>
@endif
