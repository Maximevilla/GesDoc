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









    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->



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





				<div class="timeline-item">

					<h2 class="timeline-header">{!!html_entity_decode($consultation[0]->titre_cons)!!}</h2>

					<div class="timeline-body">
						{!!html_entity_decode($consultation[0]->details_consultation)!!}

					</div>
					<div>
						<strong>Tarif :</strong> {{$consultation[0]->tarif}}
					</div>
				</div>




	</div>

</body>
</html>
