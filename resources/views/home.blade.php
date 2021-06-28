@extends('layout')

@section('content')
	<div class="row">
		<div class="col-12 col-lg-7">
			<h1 class="text-uppercase my-5">Observatoires & Culture</h1>
			<h2 class="text-uppercase">l'application tout-en-un des passionnés</h2><h2 class="text-uppercase">d'astronomie et d'espace</h2>
			<div class="d-flex my-5 flex-wrap">
				<a href="/qui-sommes-nous"><button class="oc-stylish-btn me-4"><h3>Qui-sommes nous ?</h3></button></a>
				<a href="/abonnements"><button class="oc-stylish-btn"><h3>Découvrir nos abonnements</h3></button></a>
			</div>
		</div>
		<div class="col-12 col-lg-5">
			<h1 class="text-uppercase my-5">Fil d'actualités</h1>
			<div class="d-flex flex-column gap-3">
				<div class="article w-100">
					<img class="article-bg" src="/img/news/1.png">
					<div class="article-content">
						<h4 class="oc-medium mb-2">Vers une colonisation de mars</h4>
						<h6 class="oc-light">Mars est certainement la prochaine et la première planète que l’homme va conquérir. Objet de toutes les attentions...</h6>
					</div>
				</div>
				<div class="article w-100">
					<img class="article-bg" src="/img/news/2.png">
					<div class="article-content">
						<h4 class="oc-medium mb-2">Les accessoires d’observation astronomique</h4>
						<h6 class="oc-light">Tandis qu’un oculaire, un filtre ou une lentille de Barlow...</h6>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection