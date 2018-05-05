<html>
<head>
	<meta http-equiv="Content-Type" content="text/html"; charset="utf-8"/>


</style>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>





<div style="clear:both; position:relative;">
			<div class="text-center">
			<p><strong>Dr </strong>{{$docteur[0]->nom}} {{$docteur[0]->prenom}}</p>
			<p><strong>Tel Fixe : </strong>{{$docteur[0]->telfixe}}</p>
			<p><strong>Tel Mobile : </strong>{{$docteur[0]->telmobile}}</p>
			<p><strong>Adresse : </strong>{{$docteur[0]->addresse}}</p>
			<br/>
			<p><strong>Facture : </strong>{{$facture[0]->id}}</p>

		</div>
		<br/>

		<div><h3>Patient</h3>
			<p><strong>Nom : </strong>{{$patient->nom}}</p>
			<p><strong>Prenom : </strong>{{$patient->prenom}}</p>
			<p><strong>Tel Fixe : </strong>{{$patient->telfixe}}</p>
			<p><strong>Tel Mobile : </strong>{{$patient->telmobile}}</p>

		</div>



	</div>

	<h4>Items:</h4>
	        <table class="table table-bordered">
	            <thead>
	                <tr>


	                    <th>Nom</th>
	                    <th>Description</th>
	                    <th>Prix</th>
											<th>Quantite</th>
											<th>Tax</th>
	                    <th>Total</th>
	                </tr>
	            </thead>
	            <tbody>
	                @foreach ($facturelines as $item)
	                    <tr>


	                        <td>{{ $item->item_name }}</td>
													<td>{{ $item->item_description }}</td>
	                        <td>{{ $item->price }} </td>
	                        <td>{{ $item->quantity }}</td>
													<td>{{ $item->tax }}</td>

	                        <td>{{ $item->price * $item->quantity * ($item->tax/100+1)}} </td>
	                    </tr>
	                @endforeach
	            </tbody>
	        </table>
	        <div style="clear:both; position:relative;">
	            @if($facture[0]->notes)
	                <div style="position:absolute; left:0pt; width:250pt;">
	                    <h4>Notes:</h4>
	                    <div class="panel panel-default">
	                        <div class="panel-body">
	                            {!! $facture[0]->notes !!}
	                        </div>
	                    </div>
	                </div>
	            @endif
							<div style="margin-left: 300pt;">
	                <h4>Discount: {{$facture[0]->discount}}</h4>

	            </div>
	            <div style="margin-left: 300pt;">
	                <h4>Total: {{$facture[0]->total}}</h4>
									<p><strong>Monnaie : </strong>{{$facture[0]->currency}}</p>

	            </div>
	        </div>
	        @if ($facture[0]->terms)
	            <br /><br />
	            <div class="well">
	                {!! $facture[0]->terms !!}
	            </div>
	        @endif
	</body>


</html>
