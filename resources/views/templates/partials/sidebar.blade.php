@if(auth()->check())

<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Algemeen</li>
        <!-- Optionally, you can add icons to the links -->
        <li><a {{ Route::currentRouteName() == '' ? 'is_active' : '' }} href="{{ route('users') }}"><i class="fa fa-users"></i> <span>Bewoners</span></a></li>
        
        <!-- werkgroepen -->
         <li class="treeview">
          <a href="#"><i class="fa fa-clipboard"></i> <span>Werkgroepen</span>
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