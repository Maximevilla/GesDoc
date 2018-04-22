<html>
<head>
	<meta http-equiv="Content-Type" content="text/html"; charset="utf-8"/>
  <style>
  @font-face {
    font-family: 'Elegance';
    font-weight: normal;
    font-style: normal;
    font-variant: normal;
  }
  body {
    font-family: Elegance, sans-serif;
  }
hr {
    display: block;
    margin-top: 0.5em;
    margin-bottom: 0.5em;
    margin-left: auto;
    margin-right: auto;
    border-style: inset;
    border-width: 1px;
}
div.text-center {
    text-align: center;
}
</style>
</head>
<body>





	<div class="container">
		<div class="text-center">
			<p><strong>Dr </strong>{{$docteur[0]->nom}} {{$docteur[0]->prenom}}</p>
			<p><strong>Tel Fixe : </strong>{{$docteur[0]->telfixe}}</p>
			<p><strong>Tel Mobile : </strong>{{$docteur[0]->telmobile}}</p>
			<p><strong>Adresse : </strong>{{$docteur[0]->addresse}}</p>
			<br/>
			<h3>Consultation du {{ Carbon\Carbon::parse($consultation[0]->created_at)->format('d-m-Y ') }}</h3>
			
		</div>
		<br/>

		<div>
			<p><strong>Nom : </strong>{{$patient->nom}}</p>
			<p><strong>Prenom : </strong>{{$patient->prenom}}</p>
			<p><strong>Tel Fixe : </strong>{{$patient->telfixe}}</p>
			<p><strong>Tel Mobile : </strong>{{$patient->telmobile}}</p>

		</div>

		<br/>

		<hr>

		<ul class="timeline timeline-inverse">
			<!-- timeline time label -->

			@foreach ( $consultations as $consultation)
			<li class="time-label">
						<span class="bg-red">
							{{ Carbon\Carbon::parse($consultation->created_at)->format('d-M-Y ') }}

						</span>
			</li>
			<!-- /.timeline-label -->
			<!-- timeline item -->
			<li>
				<i class="fa fa-user bg-blue"></i>

				<div class="timeline-item">
					<span class="time"><i class="fa fa-clock-o"></i> {{ Carbon\Carbon::parse($consultation->created_at)->format('H:i') }}</span>

					<h2 class="timeline-header">{!!html_entity_decode($consultation->titre)!!}</h2>

					<div class="timeline-body">
						{!!html_entity_decode($consultation->details_consultation)!!}

					</div>

				</div>
			</li>
			<hr>
			<!-- END timeline item -->
			@endforeach
			<!-- END timeline item -->

		</ul>


	</div>

</body>
</html>
