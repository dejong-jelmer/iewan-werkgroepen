        <tr>

        	<td><img src="{{ loadAvatar($user) }}" alt="User Avatar"></td>
        	<td><a href="{{ route('user', ['user_name' =>  $user->name]) }}">{{ ucfirst($user->name) }}</a></td>
        	<td><a href="mailto:{{ $user->email }}" class="text-muted">{{ $user->email }}</a></td>
        	<td>
        		@forelse($user->activeWorkgroups as $workgroup)
        		<a href="{{ route('workgroup', ['workgroup_id' => $workgroup->name]) }}" class="label label-sm label-default">{{ ucfirst($workgroup->name) }}</a>
        		@empty

        		@endforelse

        	</td>
        	<td>
        		@if(Gate::allows('aanname') || Gate::allows('edit-profile', $user))
        		<button class="btn btn-default iw-on-hover" title="Bewerken"><i class="fa fa-pencil"></i><span class="sr-only">Bewerken</span></button>
        		@endif
        	</td>

        	<td>
        		@if(Gate::allows('aanname') || Gate::allows('delete-profile', $user))
        		<button class="btn btn-default iw-on-hover" title="Verwijderen"><i class="fa fa-trash"></i><span class="sr-only">Verwijderen</span></button>
        		@endif
        	</td>
        </tr>
