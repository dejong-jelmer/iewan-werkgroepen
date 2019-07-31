@if(auth()->check())

<aside class="main-sidebar">

	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">

		<!-- Sidebar Menu -->
		<ul class="sidebar-menu" data-widget="tree">




			<!--			<li class="header">Algemeen</li>-->
			<!-- Optionally, you can add icons to the links -->
			<li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}"><a href="{{ route('dashboard') }}"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>





			<!-- werkgroepen -->
			<li class="treeview">
				<a href="#"><i class="fa fa-coffee"></i> <span>Werkgroepen</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					@isset($workgroups)
					@foreach($workgroups as $workgroup)
					<li><a href="{{ route('workgroup',['workgroup_id' =>  $workgroup->id]) }}"><i class="fa fa-circle-o"></i> {{ $workgroup->name  }}</a></li>
					@endforeach
					@endisset
				</ul>
			</li>

			<!-- bewoners -->
			<li class="request()->routeIs('users')"><a href="{{ route('users') }}"><i class="fa fa-users"></i> <span>Bewoners</span></a></li>


			<!-- Profiel -->
			<li><a href="{{ route('user-profile') }}"><i class="fa fa-user"></i> <span>Mijn profiel</span></a></li>

			<!-- Forum -->
			<li>
				<a class="request()->routeIs('forum')" href="{{ route('forum') }}">
					<i class="fa fa-comments"></i> <span>Forum</span>
					<span class="pull-right-container">
						@if(auth()->user()->newForumPosts())
						<small class="label pull-right bg-red">{{ auth()->user()->newForumPosts() }}</small>
						@endif
					</span>
				</a>
			</li>

			<!-- klapper -->
			<li>
				<a class="request()->routeIs('binder-forms')" href="{{ route('binder-forms') }}">
					<i class="fa fa-address-book"></i> <span>Klapper</span>
					<span class="pull-right-container">
						@if(auth()->user()->newBinderForms())
						<small class="label pull-right bg-red">{{ auth()->user()->newBinderForms() }}</small>
						@endif
					</span>
				</a>
			</li>
		</ul>
		<!-- /.sidebar-menu -->
	</section>
	<!-- /.sidebar -->
</aside>
@endif
