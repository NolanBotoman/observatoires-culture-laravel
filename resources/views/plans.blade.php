@extends('layout')

@section('content')
	<div class="row w-100">
		<div class="col-12 col-lg-6">
			<h1 class="text-uppercase my-5">Abonnements</h1>
			<div class="d-flex flex-column gap-3">
				<div class="subscription w-100">
					<img class="subscription-bg" src="/img/ocsubcriptions/1.png">
					<div class="subscription-content">
						<div class="d-flex align-items-center gap-5 mb-3">
							<div>
								<h1 class="text-uppercase">Découverte</h1>
								<h2 class="text-uppercase">1€ Mensuel</h2>
							</div>
							<h4 class="text-uppercase oc-bold">l'astronomie dans votre poche, ou que vous soyez</h4>
						</div>
						<h6 class="oc-light">Offre également valable au tarif de 10€ annuel</h6>
					</div>
				</div>
				<div class="subscription w-100">
					<div class="hide d-flex flex-column justify-content-center align-items-center">
						<i class="lock mb-4"></i>
						<h3 class="oc-light oc-text-black">Abonnement à venir</h3>
					</div>
					<img class="subscription-bg blur" src="/img/ocsubcriptions/2.png">
					<div class="subscription-content blur">
						<div class="d-flex align-items-center gap-5 mb-3">
							<div>
								<h1 class="text-uppercase">Astronome</h1>
								<h2 class="text-uppercase">9€ Mensuel</h2>
							</div>
							<h4 class="text-uppercase oc-bold">équipez-vous dans vos travaux d'un outil professionnel</h4>
						</div>
						<h6 class="oc-light">Offre également valable au tarif de 90€ annuel</h6>
					</div>
				</div>
			</div>
		</div>
		<div class="col d-flex align-items-center justify-content-center">
			<i class="large-show2 mt-5"></i>
		</div>
	</div>
@endsection