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
</style>
</head>
<body>









    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->



	<div class="container">

		<div>
			<h1>Consultations</h1>
			<p><strong>Nom : </strong>{{$patient->nom}}</p>
			<p><strong>Prenom : </strong>{{$patient->prenom}}</p>
			<p><strong>Tel Fixe : </strong>{{$patient->telfixe}}</p>
			<p><strong>Tel Mobile : </strong>{{$patient->telmobile}}</p>

		</div>

		<br/>

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
			<li>
				<i class="fa fa-clock-o bg-gray"></i>
			</li>
		</ul>


	</div>

</body>
</html>
