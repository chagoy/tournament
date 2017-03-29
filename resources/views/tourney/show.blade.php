@extends ('layouts.app')

@section ('content')
{{-- <form method="GET" name="seeds" action="/tournament/store/">
	{{ csrf_field() }}
	@foreach ($boxers as $boxer)
		{{ $boxer->name }}: <input type="text" name="boxer[{{ $boxer->id }}]">
		<br>
	@endforeach
	<button type="submit" class="">Submit</button>
</form> --}}

	<form method="post" action="/tournament/create/store/">
	{{ csrf_field() }}
		<div class="field">
			<label class="label">1 seed</label>
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
		<div class="field">
			<label class="label">2 seed</label>
			<p class="control">
				<span class="select">
					<select name="test2">
							@foreach ($boxers as $boxer)
							<option value="{{ $boxer->id }}">{{ $boxer->name }}</option>
							@endforeach
					</select>
				</span>
			</p>
		</div>
		<div class="field">
			<label class="label">3 seed</label>
			<p class="control">
				<span class="select">
					<select name="test3">
						@foreach ($boxers as $boxer)
						<option value="{{ $boxer->id }}">{{ $boxer->name }}</option>
						@endforeach
					</select>
				</span>
			</p>
		</div>
		<div class="field">
			<label class="label">4 seed</label>
			<p class="control">
				<span class="select">
					<select name="test4">
						@foreach ($boxers as $boxer)
						<option value="{{ $boxer->id }}">{{ $boxer->name }}</option>
						@endforeach
					</select>
				</span>
			</p>
		</div>
		<div class="field">
			<label class="label">5 seed</label>
			<p class="control">
				<span class="select">
					<select name="test5">
						@foreach ($boxers as $boxer)
						<option value="{{ $boxer->id }}">{{ $boxer->name }}</option>
						@endforeach
					</select>
				</span>
			</p>
		</div>
	<div class="field">
		<label class="label">6 seed</label>
		<p class="control">
			<span class="select">
				<select name="test6">
					@foreach ($boxers as $boxer)
					<option value="{{ $boxer->id }}">{{ $boxer->name }}</option>
					@endforeach
				</select>
			</span>
		</p>
	</div>
	<div class="field">
		<label class="label">7 seed</label>
		<p class="control">
			<span class="select">
				<select name="test7">
					@foreach ($boxers as $boxer)
					<option value="{{ $boxer->id }}">{{ $boxer->name }}</option>
					@endforeach
				</select>
			</span>
		</p>
	</div>
	<div class="field">
		<label class="label">8 seed</label>
		<p class="control">
			<span class="select">
				<select name="test8">
					@foreach ($boxers as $boxer)
					<option value="{{ $boxer->id }}">{{ $boxer->name }}</option>
					@endforeach
				</select>
			</span>
		</p>
	</div>
	<div class="field is-grouped">
		<p class="control">
			<button type="submit" class="button is-primary">submit</button>
		</p>
	</div>
	</form>


@endsection