@extends('layouts.app')

@section('content')
	<section class="hero is-dark is-bold">
		<div class="hero-body">
			<div class="container">
			<div class="columns">
				<div class="column">
				<h1 class="title">{{ $boxer->name }}</h1>
				<h2 class="subtitle">{{ $boxer->country }}</h2>
				</div>
			<div class="column is-4">
				<img class="image is-pulled-right" src="{{ $boxer->image }}">
			</div>
			</div>
		</div>
	</section>
	<nav class="level is-mobile stats-bar">
		<div class="level-item has-text-centered">
			<div>
				<p class="heading">Overall</p>
				<p class="title">80</p>
			</div>
		</div>
		<div class="level-item has-text-cenetered">
			<div>
				<p class="heading">Wins</p>
				<p class="title">{{ $boxer->win }}</p>
			</div>
		</div>
		<div class="level-item has-text-cenetered">
			<div>
				<p class="heading">KO</p>
				<p class="title">{{ $boxer->ko }}</p>
			</div>
		</div>
		<div class="level-item has-text-cenetered">
			<div>
				<p class="heading">Loss</p>
				<p class="title">{{ $boxer->loss }}</p>
			</div>
		</div>
		<div class="level-item has-text-cenetered">
			<div>
				<p class="heading">Draw</p>
				<p class="title">{{ $boxer->draw }}</p>
			</div>
		</div>
	</nav>

@endsection