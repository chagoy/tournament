@extends ('layouts.app')		

@section ('content')
	<section class="hero is-dark">
		<div class="hero-body">
			<div class="container">
				<div class="columns">
						<div class="column is-one-third">
							<h2 class="subtitle">Choose your weight class</h2>
						</div>
						<div class="column">
						{{-- <form action="/tournament/" method="get">
							<div class="field">
							  <label class="label">Subject</label>
							  <p class="control">
							    <span class="select">
							      <select>
							        <option>Select dropdown</option>
							        @foreach ($weights as $weight)
							        <option value="{{ $weight['weight'] }}">{{ $weight['weight'] }}</option>
							        @endforeach
							      </select>
							    </span>
							  </p>
							</div>
							<button type="submit" class="button is-primary">Submit</button>
						</form> --}}
						</div>
						<div class="column">
								@foreach ($weights as $weight)
									<a href="/tournament/create/{{ $weight['weight'] }}">
									<button class="button is-primary is-focused">{{ $weight['weight'] }}</button>
									</a>
								@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection