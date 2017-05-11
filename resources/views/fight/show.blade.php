@extends ('layouts.app')

@section ('content')
<div class="container">
	<form id="1v1" method="post" action="/1v1/create/store">
		{{ csrf_field() }}
			<div class="field">
			<h1 class="title 1v1">Player 1</h1>
			<p class="control 1v1">
				<span class="select 1v1">
					<select name="test1">
						@foreach ($boxers as $boxer)
							<option value="{{ $boxer->id }}">{{ $boxer->name }}</option>
						@endforeach
					</select>
				</span>
			</p>
		</div>
		<div class="field 1v1">
			<h1 class="title 1v1">Player 2</h1>
			<p class="control">
				<span class="select">
					<select name="test1">
						@foreach ($boxers as $boxer)
							<option value="{{ $boxer->id }}">{{ $boxer->name }}</option>
						@endforeach
					</select>
				</span>
			</p>
		</div>
	</form>
</div>
@endsection