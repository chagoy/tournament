@extends ('layouts.app')

@section ('content')

<!-- HEADLINE BAR AT THE TOP OF THE PAGE-->
<section class="hero is-dark">
	<div class="hero-body">
		<div class="container">
			<h1 class="title">The Elite Eight of the Ali Cup</h1>
			<h2 class="subtitle">For all the marbles</h2>
		</div>
	</div>
</section>
<!-- END OF HEADLINE PART -->

<!-- BRACKET BEGINS -->
<div class="container">
	<div class="columns">
		<!-- ROUND 1 -->
		<div class="column is-one-quarter">
			<h1 class="title">Round 1</h1>
			<!-- START OF 1v8 -->
			<div class="box">
				<article class="media">
					<div class="media-left">
						<figure class="image is-64x64">
							<img src="{{ $boxer[1]->image }}">
						</figure>
					</div>
					<div class="media-content">
						<div class="content">
							1. {{ $boxer[1]->name }}
						</div>
					</div>
				</article>
			</div>
			<div class="box">
				<article class="media">
					<div class="media-left">
						<figure class="image is-64x64">
							<img src="{{ $boxer[8]->image }}">
						</figure>
					</div>
					<div class="media-content">
						<div class="content">
							8. {{ $boxer[8]->name }}
						</div>
					</div>
				</article>
			</div>
				<button id="round1fight1" class="button is-dark">Sim 1 vs 8</button>
				<!-- END OF 1v8-->
			<div class="box"> <!-- START OF 2v7 -->
				<article class="media">
					<div class="media-left">
						<figure class="image is-64x64">
							<img src="{{ $boxer[2]->image }}">
						</figure>
					</div>
					<div class="media-content">
						<div class="content">
							2. {{ $boxer[2]->name }}
						</div>
					</div>
				</article>
			</div>
			<div class="box">
				<article class="media">
					<div class="media-left">
						<figure class="image is-64x64">
							<img src="{{ $boxer[7]->image }}">
						</figure>
					</div>
					<div class="media-content">
						<div class="content">
							7. {{ $boxer[7]->name }}
						</div>
					</div>
				</article>
			</div>
				<button id="round1fight2" class="button is-dark">Sim 2 vs 7</button>
				<!-- END OF 2v7 -->
			<div class="box"> <!-- START OF 3v6 -->
				<article class="media">
					<div class="media-left">
						<figure class="image is-64x64">
							<img src="{{ $boxer[3]->image }}">
						</figure>
					</div>
					<div class="media-content">
						<div class="content">
							3. {{ $boxer[3]->name }}
						</div>
					</div>
				</article>
			</div>
			<div class="box">
				<article class="media">
					<div class="media-left">
						<figure class="image is-64x64">
							<img src="{{ $boxer[6]->image }}">
						</figure>
					</div>
					<div class="media-content">
						<div class="content">
							6. {{ $boxer[6]->name }}
						</div>
					</div>
				</article>
			</div>
				<button id="round1fight3" class="button is-dark">Sim 3 vs 6</button>
				<!-- END OF 3v6 -->
			<div class="box"> <!-- START OF 4v5 -->
				<article class="media">
					<div class="media-left">
						<figure class="image is-64x64">
							<img src="{{ $boxer[4]->image }}">
						</figure>
					</div>
					<div class="media-content">
						<div class="content">
							4. {{ $boxer[4]->name }}
						</div>
					</div>
				</article>
			</div>
			<div class="box">
				<article class="media">
					<div class="media-left">
						<figure class="image is-64x64">
							<img src="{{ $boxer[5]->image }}">
						</figure>
					</div>
					<div class="media-content">
						<div class="content">
							5. {{ $boxer[5]->name }}
						</div>
					</div>
				</article>
			</div>
				<button id="round1fight4" class="button is-dark">Sim 4 vs 5</button>
				<!-- END OF 4v5 -->
		</div> <!-- END OF ROUND 1 -->
		<!-- ROUND 2 -->
		<div class="column is-one-quarter">
			<h1 class="title">Round 2</h1>
			<!-- START OF R2 - 1v3 -->
			<!-- R2 S1 -->
			<div class="box bracket-box">
				<article class="media">
					<div class="media-left">
						<figure class="image is-64x64">
							<img id="round2seed1image" src="">
						</figure>
					</div>
					<div class="media-content">
						<div id="round2seed1name" class="content"></div>
							<p class="method" id="round2seed1method"></p>
					</div>
				</article>
			</div>
			<!-- R2 S3 -->
			<div class="box bracket-box">
				<article class="media">
					<div class="media-left">
						<figure class="image is-64x64">
							<img id="round2seed3image" src="">
						</figure>
					</div>
					<div class="media-content">
						<div class="content" id="round2seed3name"></div>
							<p class="method" id="round2seed3method"></p>
					</div>
				</article>
			</div>
				<button id="round2fight1" class="button is-dark">Sim 1 vs 3</button>
			<!-- ROUND 2 - 2v4-->
			<!-- R2 S2 -->
			<div class="box bracket-box">
				<article class="media">
					<div class="media-left">
						<figure class="image is-64x64">
							<img id="round2seed2image" src="">
						</figure>
					</div>
					<div class="media-content">
						<div class="content" id="round2seed2name">
						</div>
						<p class="method" id="round2seed2method"></p>
					</div>
				</article>
			</div>
			<!-- R2 S4 -->
			<div class="box bracket-box">
				<article class="media">
					<div class="media-left">
						<figure class="image is-64x64">
							<img id="round2seed4image" src="">
						</figure>
					</div>
					<div class="media-content">
						<div class="content" id="round2seed4name"></div>
						<p class="method" id="round2seed4method"></p>
					</div>
				</article>
			</div>
				<button id="round2fight2" class="button is-dark">Sim 2 vs 4</button>
		</div> <!-- END ROUND 2 -->
		<div class="column is-one-quarter">
			<h1 class="title">Round 3</h1>
			<!-- START OF FINAL R3S1 vs R3S2 -->
			<!-- R3 S1 -->
			<div class="box">
				<article class="media">
					<div class="media-left">
						<figure class="image is-64x64">
							<img id="round3seed1image" src="">
						</figure>
					</div>
					<div class="media-content">
						<div class="content" id="round3seed1name"></div>
						<p class="method" id="round3seed1method"></p>
					</div>
				</article>
			</div>
			<!-- R3 S2 -->
			<div class="box">
				<article class="media">
					<div class="media-left">
						<figure class="image is-64x64">
							<img id="round3seed2image" src="">
						</figure>
					</div>
					<div class="media-content">
						<div class="content" id="round3seed2name"></div>
						<p class="method" id="round3seed2method"></p>
					</div>
				</article>
			</div>
				<button id="finalmatch" class="button is-dark">Sim Final</button>
		</div>
		<!-- WINNER -->
		<div class="column is-one-quarter">
			<div class="box">
				<article class="media">
					<div class="media-left">
						<figure class="image is-64x64">
							<img id="winnerimage" src="">
						</figure>
					</div>
					<div class="media-content">
						<div class="content" id="winnername"></div>
						<p class="method" id="winnermethod"></p>
					</div>
				</article>
			</div>
		</div>
	</div>
</div>

@include ('layouts.footer')

@endsection