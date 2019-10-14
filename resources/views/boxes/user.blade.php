        <tr>

        	<td><img src="{{ !empty($user->photo) ? Storage::url($user->photo) : asset('img/empty-avatar.jpg') }}" alt="User Avatar"></td>
        	<td><a href="{{ route('user', ['user_name' =>  $user->name]) }}">{{ ucfirst($user->name) }}</a></td>
        	<td><a href="mailto:{{ $user->email }}" class="text-muted">{{ $user->email }}</a></td>
        	<td>
        		@forelse($user->workgroups as $workgroup)
        		<a href="{{ route('workgroup', ['workgroup_id' => $workgroup->name]) }}" class="label label-sm label-default">{{ $workgroup->name }}</a>
        		@empty

        		@endforelse

        	</td>
        	<td>
        		@if(auth()->user()->hasWorkgroupRole('aanname') || $user->id == auth()->user()->id )
        		<button class="btn btn-default" title="Bewerken"><i class="fa fa-pencil"></i><span class="sr-only">Bewerken</span></button>
        		@endif
        	</td>

        	<td>
        		@if(auth()->user()->hasWorkgroupRole('aanname') )
        		<button class="btn btn-default" title="Verwijderen"><i class="fa fa-trash"></i><span class="sr-only">Verwijderen</span></button>
        		@endif
        	</td>
        </tr>
