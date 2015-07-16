<html>
<head>
	<title>Welcome</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/welcome.css" media="screen" title="no title" charset="utf-8">
</head>
<body>

	<div id="container">
	<h1>Welcome</h1>
		<form action="users/register" method="post">
			<div class="form-group">
				<label>Name:<span><?= $this->session->flashdata('errors[0]'); ?></span></label>
				<input type="text" name="name" class="form-control">
			</div>

			<div class="form-group">
				<label>Alias:<span><?= $this->session->flashdata('errors[1]'); ?></span></label>
				<input type="text" name="alias" class="form-control">
			</div>

			<div class="form-group">
				<label>Email:<span><?= $this->session->flashdata('errors[2]'); ?></span></label>
				<input type="text" name="email" class="form-control">
			</div>

			<div class="form-group">
				<label>Password:<span><?= $this->session->flashdata('errors[3]'); ?></span></label>
				<input type="password" name="password" class="form-control">
			</div>

			<div class="form-group">
				<label>Confirm Password:<span><?= $this->session->flashdata('errors[4]'); ?></span></label>
				<input type="password" name="cpassword" class="form-control">
			</div>
			<input type="submit" value="Register" class="btn btn-default">

		</form>

		<form action="users/login" method="post">
			<div class="form-group">
				<label>Email:<span><?= $this->session->flashdata('errors[5]'); ?></span></label>
				<input type="text" name="email" class="form-control">
			</div>

			<div class="form-group">
				<label>Password:</label>
				<input type="password" name="password" class="form-control">
			</div>
			<input type="submit" value="Login" class="btn btn-default">
		</form>
	</div>

</body>
</html>
