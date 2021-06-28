@extends('layout')

@section('bodyClass')
	bg-black
@endsection

@section('content')
	<div class="d-flex align-items-center">
		<h1 class="text-uppercase my-5">Nos actualités /</h1>
		<h3 class="text-uppercase">{{ $article->title }}</h3>
	</div>
	<img class="article-image" src="{{ $article->image()">
	<div class="d-flex flex-column">
		{{ $article->content }}
	</div>
@endsection