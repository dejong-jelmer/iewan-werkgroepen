        <div class="card">
            <header class="card-header">
                <p class="card-header-title">
                    <a class="has-text-dark" href="{{ route('workgroup', ['workgroup_id' => $workgroup->id]) }}">{{ $workgroup->name }}</a>
                </p>
            </header>
            <div class="card-content">
                <div class="columns">
                    <div class="column is-4">
                        <a href="{{ route('show-user-messages') }}">
                            <i class="far fa-envelope is-size-4 @if(auth()->user()->unRepliedWorkgroupMessages($workgroup)) badge @endif" data-count="{{ auth()->user()->unRepliedWorkgroupMessages($workgroup) }}"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="tile is-child box workgroup-tile"> --}}
           {{--  <form action="{{ route('workgroup', ['workgroup_id' => $workgroup->id]) }}">@csrf</form>
                    <div class="columns" style="border:1px solid">
                        <div class="column is-10">
                            <h5 class="title is-5"></h5>
                        </div>
                        <div class="column is-2">
                            <span class="tag is-success">1</span>
                        </div>
                    </div>
                    <div class="columns" style="border:1px solid;">
                        <div class="column"><p>test</p></div>
                        <div class="column"><p>test</p></div>
                        <div class="column"><p>test</p></div>
                        <div class="column"><p>test</p></div>
                    </div> --}}
                    {{-- <ul>
                        @foreach($workgroup->user as $user)
                        <li>{{ $user->name }}</li>
                        @endforeach
                    </ul> --}}
        {{-- </div> --}}


