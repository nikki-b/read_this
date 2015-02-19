<?php $this->load->view("partials/header_view")?>
<div class="container">
	<div class="col-xs-10">
	<h2>Welcome to BookReview!</h2>
	<form class="form-horizontal col-xs-6" action="/users/new_user" method="post">
		<h3>Register</h3>
		<input type="hidden" name="action" value="register">
		<div class="form-group">
			<label class="col-xs-5">Name: </label><input class="col-xs-7" type="text" name="name">
		</div>
		<div class="form-group">
			<label class="col-xs-5">Alias: </label><input class="col-xs-7" type="text" name="alias">
		</div>
		<div class="form-group">
			<label class="col-xs-5">Email: </label><input class="col-xs-7" type="text" name="email">
		</div>
		<div class="form-group">
			<label class="col-xs-5">Password: </label><input class="col-xs-7" type="password" name="password">
		</div>
		<div class="form-group">
			<label class="col-xs-5">Confirm Password: </label><input class="col-xs-7" type="password" name="confirmPassword">
		</div>
		<div class="form-group">
			<input class="pull-right btn btn-default" type="submit" value="Register">
		</div>
	</form>
	<span class="text-danger"><?= $this->session->flashdata("register_errors") ?></span>
	<form class="form-horizontal col-xs-6" action="/users/login_user" method="post">
		<h3>Login</h3>
		<div class="form-group">
			<input type="hidden" name="action" value="login">
		</div>
		<div class="form-group">
			<label class="col-xs-5">Email: </label><input class="col-xs-7" type="text" name="email">
		</div>
		<div class="form-group">
			<label class="col-xs-5">Password: </label><input class="col-xs-7" type="password" name="password">
		</div>
		<div class="form-group">
			<input class="btn btn-default pull-right" type="submit" value="Login">
		</div>
	</form>
	<span class="text-danger"><?= $this->session->flashdata("login_errors") ?></span>
</div>
</body>
</html>