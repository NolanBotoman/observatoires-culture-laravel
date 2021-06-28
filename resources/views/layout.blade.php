<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $page }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/custom.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" defer></script>
    @yield ('head')
</head>
<body class="oc-container @yield('bodyClass')">
	<nav>
        <input class="d-none" type="checkbox" id="sidebar" name="sidebar" onclick="lockScroll();">
        <div class="oc-nav d-flex">
            <div class="w-100 d-flex flex-row justify-content-between">
                <div>
                    <i class="oc"></i>
                    <h3><a class="text-uppercase oc-responsive-title" href="/"></a></h3>
                </div>
                <div class="d-flex">
                    <h3><a class="text-uppercase" href="/qui-sommes-nous">Qui sommes-nous ?</a></h3>
                    <h3><a class="text-uppercase" href="/nos-actualités">Nos actualités</a></h3>
                    <h3><a class="text-uppercase" href="/abonnements">Abonnements</a></h3>
                    <label for="search"><i class="search"></i></label>
                    <label for="sidebar"><i class="bars">a</i></label>
                </div>
            </div>
        </div>
        <div class="sidebar">
            <div class="row">
                <label for="sidebar"><i class="bars">a</i></label>
            </div> 
            <div class="row d-flex justify-content-between align-items-center">
                <div>
                    <div class="mb-2">
                        <h2><a class="text-uppercase" href="/qui-sommes-nous">Qui sommes-nous ?</a></h2>
                        <h2><a class="text-uppercase" href="/nos-actualités">Nos actualités</a></h2>
                        <h2><a class="text-uppercase" href="/abonnements">Abonnements</a></h2>
                        <h2><a class="text-uppercase" href="/nous-contacter">Nous contacter</a></h2>
                    </div>
                @if (!Auth::user())
                    <h2><a class="text-uppercase" href="/créer-un-compte">Créer un compte</a></h2>
                    <h2><a class="text-uppercase" href="/se-connecter">Se connecter</a></h2>
                @else
                    <h2><a class="text-uppercase" href="/mon-compte">Mon compte</a></h2>
                    <h2><a class="text-uppercase" href="/se-déconnecter">Se déconnecter</a></h2>
                @endif
                </div>
                <i class="books"></i>
            </div> 
        </div>
    </nav>
    <main>
	   @yield ('content')
    </main>
	<div class="oc-footer d-flex justify-content-between align-items-center">
        <span class="oc-footer-title">www.observatoires-culture.fr © 2021</span>
        <h6 class="oc-light"><a href="">Conditions générales de vente</a> - <a href="">Mentions légales</a></h6>
	</div>
</body>
</html>