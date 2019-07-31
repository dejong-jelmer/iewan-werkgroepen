@if(auth()->check())

<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Algemeen</li>
        <!-- Optionally, you can add icons to the links -->
        <li {{ Route::currentRouteName() == '' ? 'active' : '' }}><a href="{{ route('dashboard') }}"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>
        
        <li {{ Route::currentRouteName() == '' ? 'active' : '' }}><a href="{{ route('users') }}"><i class="fa fa-users"></i> <span>Bewoners</span></a></li>
        
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
                            <li><a href="{{ route('workgroup',['workgroup_id' =>  $workgroup->id]) }}">{{ $workgroup->name  }}</a></li>
                        @endforeach
                    @endisset
          </ul>
        </li>
        
        
        <!-- klapper -->
        <li>
          <a {{ Route::currentRouteName() == '' ? 'is_active' : '' }} href="{{ route('binder-forms') }}">
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