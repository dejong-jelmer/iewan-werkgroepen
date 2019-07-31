        <tr>

        	<td>{{ $user->id }}</td>
        	<td><img src="https://i.pravatar.cc/48?u={{$user->id}}" alt="User Avatar"></td>
        	<td><a href="{{ route('user', ['user_id' =>  $user->id]) }}">{{ $user->name }}</a></td>
        	<td>{{ $user->email }}</td>
        	<td><a href="#"><span class="label label-default">Webgroep</span></a>
        		<a href="#"><span class="label label-default">Voko</span></a>
        		<a href="#"><span class="label label-default">TD</span></a></td>
        </tr>
