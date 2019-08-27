        <tr>

        	<td><img src="https://i.pravatar.cc/48?u={{$user->id}}" alt="User Avatar"></td>
        	<td><a href="{{ route('user', ['user_id' =>  $user->id]) }}">{{ $user->name }}</a></td>
        	<td>{{ $user->email }}</td>
        	<td>
        		@forelse($user->workgroups as $workgroup)
        		<a href="{{ route('workgroup', ['workgroup_id' => $workgroup->id]) }}" class="label label-sm label-default">{{ $workgroup->name }}</a>
        		@empty
        		<span>Je zit nog niet in een werkgroep</span>
        		@endforelse

        	</td>
        	<td><button class="btn btn-default" title="Bewerken"><i class="fa fa-pencil"></i><span class="sr-only">Bewerken</span></button></td>
        </tr>
