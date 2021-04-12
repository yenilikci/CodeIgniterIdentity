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
			</div>
		</div>
	</div>
	<?php
}
?>

<?php
//beni hatırla için;
	$this->load->helper("cookie");
	$remember_me = get_cookie("remember_me");
	if ($remember_me) {
		$member = json_decode($remember_me);
		print_r($member);
	}
?>


<div class="container">
	<div class="row">
		<div class="col s6 offset-s3">

			<form action="<?php echo base_url('member/signin') ?>" method="post">


				<div class="card-panel white">

					<div class="row">
						<div class="input-field col s12">
							<input type="email" name="email" value="<?php echo (isset($member)) ? $member->email : "" ;?>">
							<label>E-posta Adresi</label>
						</div>
					</div>


					<div class="row">
						<div class="input-field col s12">
							<input type="password" name="password"  value="<?php echo (isset($member)) ? $member->password : "" ;?>">
							<label>Şifre</label>
						</div>
					</div>

					<div class="row">
						<div class="col">
							<label>
								<input id="indeterminate-checkbox" name="remember_me" type="checkbox" <?php echo (isset($member)) ? "checked" : ""; ?>/>
								<span>Beni Hatırla</span>
							</label>
						</div>
					</div>


					<div class="row center-align">
						<button class="btn green waves-effect waves-light" type="submit">GİRİŞ YAP
							<i class="material-icons right">send</i>
						</button>

						<a href="#modal1" class="btn-flat waves-effect modal-trigger">ŞİFREMİ UNUTTUM
							<i class="material-icons left">help</i>
						</a>
					</div>

			</form>

		</div>
	</div>

</div>

</div>
</div>

<div id="modal1" class="modal">
	<div class="modal-content">
		<h4>Şifremi unuttum</h4>
		<p>Şifrenizi hatırlatmak için yeni bir şifre oluşturup göndereceğiz.
		Bunun için sistemde kayıtlı olan e-posta adresinizi giriniz.</p>

		<form action="<?php echo base_url();?>" method="post">
			<div class="row">
				<div class="input-field col s12">
					<input type="email" id="email" name="email" placeholder="Sistemde kayıtlı e-posta adresinizi giriniz">
					<label for="email">E-posta Adresi</label>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="modal-close waves-effect waves-green btn green"><i class="material-icons left">send</i>Gönder</button>
			</div>
		</form>
	</div>
</div>

<script src="https://code.jquery.com/jquery -3.5.1.slim.min.js"></script>
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

	$(".modal").modal();

</script>
</body>

</html>
