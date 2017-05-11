@extends ('layouts.app')

@section ('content')

<section class="hero is-bold">
	<div class="hero-body">
		<div class="container">
			<h1 class="title">
				Simple one-on-one
			</h1>
			<h2 class="subtitle">
				Choose your weight class
			</h2>
		</div>
	</div>
</section>
<hr>
<div class="weight-selection">
	@foreach ($weights as $weight)
			<button class="button is-dark btn"><a href="/1v1/create/{{ $weight['weight'] }}">{{ $weight['weight'] }}</button></button>
	@endforeach
</div>
@endsection

@include ('layouts.footer')