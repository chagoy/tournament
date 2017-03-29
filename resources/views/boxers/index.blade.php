@extends ('layouts.app')

@section('content')

<table class="table">
	<thead>
		<tr>
		<th><abbr title="Rank">RNK</abbr></th>
		<th>Name</th>
		<th>Age</th>
		<th><abbr title="Weight">WT</abbr></th>
		<th><abbr title="Country">HOME</abbr></th>
		<th><abbr title="Popularity">POP</abbr></th>
		<th><abbr title="Power">POW</abbr></th>
		<th><abbr title="Speed">SPD</abbr></th>
		<th><abbr title="Defense">DEF</abbr></th>
		<th><abbr title="Offense">OFF</abbr></th>
		<th><abbr title="Chin">CHN</abbr></th>
		<th><abbr title="Stamina">STM</abbr></th>
		<th><abbr title="Potential">POT</abbr></th>
	</tr>
	</thead>
	<tbody>
	@foreach ($boxers as $boxer)
		<tr>
			<th>{{ $loop->iteration }}</th>
			<td><a href="/boxers/{{ $boxer->id }}">{{ $boxer->name }}</a></td>
			<td>{{ $boxer->age }}</td>
			<td><a href="/boxers/?weight={{ $boxer->weight }}">{{ $boxer->weight . "weight"}}</a></td>
			<td><a href="/boxers/?country={{ $boxer->country }}">{{ $boxer->country }}</a></td>
			<td>{{ $boxer->popularity }}</td>
			<td>{{ $boxer->power }}</td>
			<td>{{ $boxer->speed }}</td>
			<td>{{ $boxer->defense }}</td>
			<td>{{ $boxer->offense }}</td>
			<td>{{ $boxer->chin }}</td>
			<td>{{ $boxer->stamina }}</td>
			<td>{{ $boxer->potential }}</td>
		</tr>
		@endforeach
	</tbody>
</table>
		

	</tfoot>


</table>


@endsection