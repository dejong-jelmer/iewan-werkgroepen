@if(auth()->check())
    <aside id="sidebar-links" class="menu is-hidden-mobile has-text-centered">
        <ul class="menu-list">
            <li><a class="{{ Route::currentRouteName() == 'dashboard' ? 'is-active' : '' }}" href={{ route('dashboard') }}><i class="fas fa-tachometer-alt is-size-4"></i></a></li>
        </ul>
        <p class="menu-label">
            Algemeen
        </p>
        <ul class="menu-list">
            <li>
                <a class="dropdown-toggle" {{ Route::currentRouteName() == '' ? 'is_active' : '' }} href="#"><i class="fas fa-users-cog is-size-4"></i>&nbsp;<i class="fas fa-caret-down"></i></a>
                <ul class="dropdown-list">
                    @isset($workgroups)
                        @foreach($workgroups as $workgroup)
                            <li><a href="{{ route('workgroup',['workgroup_id' =>  $workgroup->id]) }}">{{ $workgroup->name  }}</a></li>
                        @endforeach
                    @endisset
                  </ul>
            </li>
        </ul>
        <p class="menu-label">
            Leden
        </p>
          <ul class="menu-list">
            <li>
                <a class="dropdown-toggle" {{ Route::currentRouteName() == '' ? 'is_active' : '' }} href="{{ route('users') }}"><i class="fas fa-users is-size-4"></i></a>
            </li>
            <li>
                <a class="dropdown-toggle" {{ Route::currentRouteName() == '' ? 'is_active' : '' }} href="#"><i class="fas fa-user is-size-4"></i>&nbsp;<i class="fas fa-caret-down"></i></a>
                 <ul class="dropdown-list">
                        @isset($users)
                            @foreach($users as $user)
                                @if($user->id != auth()->user()->id)
                                    <li><a href="{{ route('user', ['user_id' =>  $user->id]) }}">{{ $user->name }}</a></li>
                                @endif
                            @endforeach
                        @endisset
                  </ul>
            </li>
            <li><a {{ Route::currentRouteName() == '' ? 'is_active' : '' }} href="{{ route('binder-forms') }}"><i class="fas fa-address-book is-size-3 @if(auth()->user()->newBinderForms()) badge @endif" data-count="{{ auth()->user()->newBinderForms() }}"></i></a></li>
          </ul>
    </aside>
@endif
