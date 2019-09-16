        <tr>

        	<td><img src="https://i.pravatar.cc/48?u={{$user->id}}" alt="User Avatar"></td>
        	<td><a href="{{ route('user', ['user_id' =>  $user->id]) }}">{{ $user->name }}</a></td>
        	<td><a href="mailto:{{ $user->email }}" class="text-muted">{{ $user->email }}</a></td>
        	<td>
        		@forelse($user->workgroups as $workgroup)
        		<a href="{{ route('workgroup', ['workgroup_id' => $workgroup->id]) }}" class="label label-sm label-default">{{ $workgroup->name }}</a>
        		@empty
        		<span>Je zit nog niet in een werkgroep</span>
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
