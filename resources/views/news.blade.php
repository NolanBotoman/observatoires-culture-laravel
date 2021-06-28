@extends('layout')

@section('content')
	<div class="d-flex flex-column">
		<h1 class="text-uppercase my-5">Nos Actualités</h1>
		<div class="d-flex flex-wrap gap-3">
				<div class="article">
					<img class="article-large-bg" src="/img/news/1.png">
					<div class="article-content">
						<h4 class="oc-medium mb-2">Vers une colonisation de mars</h4>
						<h6 class="oc-light">Mars est certainement la prochaine et la première planète que l’homme va conquérir. Objet de toutes les attentions...</h6>
					</div>
				</div>
				<div class="article">
					<img class="article-large-bg" src="/img/news/2.png">
					<div class="article-content">
						<h4 class="oc-medium mb-2">Les accessoires d’observation astronomique</h4>
						<h6 class="oc-light">Tandis qu’un oculaire, un filtre ou une lentille de Barlow...</h6>
					</div>
				</div>
			</div>
	</div>
@endsection