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

<?php
	if(isset($error))
	{?>
		<div class="container">
		<div class="row">
		<div class="col s6 offset-s3">
			<div class="card-panel red white-text center-align pulse">
				<?=$error?>
			</div>
			</div>	</div>
		</div>
		<?php
	}	
?>




	<div class="container">
		<div class="row">
			<div class="col s6 offset-s3">

			<form action="<?php echo base_url('member/registration') ?>" method="post">

			
			<div class="card-panel white">
					<div class="input-field">
						<input type="text" name="fullname">
						<label>Ad Soyad</label>
					</div>

					<div class="input-field">
						<input type="email" name="email">
						<label>E-posta Adresi</label>
					</div>

					<div class="input-field">
						<input type="text" name="phone">
						<label>Telefon</label>
					</div>

					<div class="input-field">
						<select name="gender">
							<option value="" disabled selected>Ben bir...</option>
							<option value="k">Kadınım</option>
							<option value="e">Erkeğim</option>
						</select>
						<label>Cinsiyet</label>
					</div>

					<div class="input-field">
						<input type="password" name="password">
						<label>Şifre</label>
					</div>

					<div class="input-field">
						<input type="password" name="repassword">
						<label>Tekrar Şifre</label>
					</div>

					<button class="btn green waves-effect waves-light" type="submit">Üye ol
						<i class="material-icons right">add</i>
					</button>

					<a href="" class="btn red waves-effect">Vazgeç
						<i class="material-icons left">close</i>
					</a>


			</form>

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
