<nav class="navbar is-fixed-top" role="navigation" aria-label="main navigation">
    <div class="container">
        <div class="navbar-brand is-full">
        <a class="navbar-item" href="{{ route('dashboard') }}">
          <img src="{{ asset('img/Iewan-logo-kleur-op-wit-300x300.jpg') }}" alt="iewan" height="30" width="30">
        </a>

        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbar-links">
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
        </a>
        </div>

        <div id="navbar-links" class="navbar-menu">
        <div class="navbar-start">
          <a class="navbar-item" href="{{ route('forum') }}">
                <i class="far fa-comments is-size-4 @if(auth()->user()->newForumPosts()) badge @endif" data-count="{{ auth()->user()->newForumPosts() }}"></i>
          </a>

          {{-- <div class="navbar-item"> --}}
            <a class="navbar-item" href="{{ route('user-profile') }}">
              <i class="fas fa-user-circle is-size-4"></i>
            </a>

            {{-- <div class="navbar-dropdown">
              <a class="navbar-item" >
                Profiel
              </a>
            </div> --}}
          {{-- </div> --}}
        </div>

        <div class="navbar-end">
          <div class="navbar-item">
            {{ auth()->user()->name }}
          </div>
          <div class="navbar-item">
            <a class="navbar-item" href="{{ route('show-user-messages') }}">
                <i class="far fa-envelope is-size-4 @if(auth()->user()->newMessages()) badge @endif" data-count="{{ auth()->user()->newMessages() }}"></i>
            </a>

          </div>
          <div class="navbar-item">
            <div class="buttons">
              <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="button is-primary">
                        Log uit
                    </button>
                </form>
            </div>
          </div>
        </div>
        </div>
    </div>
</nav>
