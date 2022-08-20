<!--------------- Load all required files ---------------->
<?php require_once "load.php";

$email_send = false;

//================== when form submitted ===============
if (isset($_POST['submit'])) {

	$email = $_POST['email'];
	$sub = $_POST['submit'];

	if ($sub) {
		if ($email != "") $email_send = true;
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= SITE_TITLE ?> - Forgot Password</title>
	<!---------------- Load all css ------------------>
	<?= get_css(); ?>
</head>

<body>
	<section class="wrapper pt-5">
		<div class="container">
			<div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 text-center">

				<form class="rounded bg-white shadow p-3 p-sm-5" method="post">

					<div class="mb-5">
						<h1 class="m-0 p-0"><?= SITE_TITLE ?></h1>
						<p>We Promise Quality</p>
					</div>

					<div class="logo my-3">
						<img src="images/forgot.jpg" class="img-fluid" alt="logo">
					</div>

					<h3 class="text-dark fw-bolder fs-4 mb-2">Forget Password ?</h3>

					<?php if ($email_send) { ?>
						<div class="fw-normal text-success my-5">
							Success! Please Check The Email at "<?= $email ?>"
						</div>

						<a class="btn btn-primary submit_btn ms-3" href="<?= SITE_URL ?>">Done</a>

					<?php } else { ?>
						<div class="fw-normal text-muted mb-4">
							Enter your email to reset your password.
						</div>

						<div class="form-floating mb-3">
							<input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
							<label for="floatingInput">Email address</label>
						</div>


						<button type="submit" name="submit" value="submit" class="btn btn-primary submit_btn my-4">Submit</button>
						<a class="btn btn-secondary submit_btn my-4" href="<?= SITE_URL ?>">Cancel</a>

					<?php } ?>
				</form>
			</div>
		</div>
	</section>

	<!-------------- Load all javascript ------------>
	<?= get_js(); ?>

</body>

</html>