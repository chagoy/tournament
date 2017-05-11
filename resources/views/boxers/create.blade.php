@extends ('layouts.app')

@section ('content')
<div class="container">
	<form method="POST" action="/add">
		<div class="control">
			<label for="name" class="label">Boxer Name:</label>
			<input type="text" id="name" name="name" class="input" v-model="name">
		</div>
		<div class="control">
			<label for="weight" class="label">Weight Class:</label>
			<input type="text" id="weight" name="weight" class="input" v-model="weight">
		</div>
		<button type="submit" class="button is-primary">Submit</button>
	</form>
</div>

@endsection