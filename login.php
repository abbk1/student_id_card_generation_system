<?php  include "includes/header.php"; ?>

<?php
if(isset($_POST["login"])) {

	$email = mysqli_escape_string($conn, trim($_POST["email"]));
	$password = mysqli_escape_string($conn, trim($_POST["password"]));

	if(!empty($email) && !empty($password)) {

	$query = "SELECT * FROM tblusers WHERE email = '$email' AND password = '$password'";

	$select_user = mysqli_query($conn, $query);

	confirmQueryExc($select_user);

	if(mysqli_num_rows($select_user) > 0){
		while($row = mysqli_fetch_assoc($select_user)){
			$firstname = $row['firstname'];
			$lastname  = $row['lastname'];
			$user_role = $row['user_role'];
			$email 	   = $row['email'];
			$status    = $row['status'];
			$user_id   = $row['user_id'];
		}
		$_SESSION['user_role'] = $user_role;
		$_SESSION['user_email'] = $email;
		$_SESSION['status'] = 1;
		$_SESSION['firstname'] = $firstname;
		$_SESSION['lastname'] = $lastname;
		$_SESSION['user_id'] = $user_id;

		if(checkIfUserLogin()){
			header('Location: index.php');
		}else{
			header('Location: login.php');
		}
	
	}else {

		$message = '<p class="text-danger">Invalid User email or Password</p>';
	}
}else{
	$message = '<p class="text-danger">All fields are required</p>';
}

}

?>

<!-- Page Content -->
<div class="container">
	<div class="form-gap"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="text-center">


							<h3><i class="fa fa-user fa-4x"></i></h3>
							<h2 class="text-center">Log-in</h2>
							<div class="panel-body">

								<?= $message = (isset($message)) ? $message : '' ; ?>
								<form id="login-form" role="form" autocomplete="off" action="" class="form" method="post">

									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-user color-blue"></i></span>
											<input name="email" type="email" class="form-control" placeholder="Enter email" autocomplete="on">
										</div>
									</div>

									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-lock color-blue"></i></span>
											<input name="password" type="password" class="form-control" placeholder="Enter Password">
										</div>
									</div>

									<div class="form-group">

										<input name="login" class="btn btn-lg btn-primary btn-block" value="Login" type="submit">
									</div>


								</form>

							</div><!-- Body-->

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<hr>

	<?php include "includes/footer.php";?>

</div> <!-- /.container -->
