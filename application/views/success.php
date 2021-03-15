<!DOCTYPE html>
<html>

<head>
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="<?=base_url("assets");?>/css/materialize.min.css"
		media="screen,projection" />

	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body style="background-color: #1b1c1d;">





	<div class="container">
		<div class="row">
			<div class="col s6 offset-s3">

				<div class="card-panel green white-text center-align">
					<i class="material-icons large">mood</i>
					<p>Üyeliğiniz başarılı bir şekilde aktifleştirilmiştir.</p>

			</div>
		</div>

	</div>

	</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<!--JavaScript at end of body for optimized loading-->
	<script type="text/javascript" src="<?=base_url("assets");?>/js/materialize.min.js"></script>
	<script>
		document.addEventListener('DOMContentLoaded', function () {
			var elems = document.querySelectorAll('select');
			var instances = M.FormSelect.init(elems, options);
		});

		// Or with jQuery

		$(document).ready(function () {
			$('select').formSelect();
		});

	</script>
</body>

</html>
