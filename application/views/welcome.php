<?php $this->load->view("partials/header")?>
<div class="container">
	<div class="col-xs-10">
	<h2>Welcome to BookReview!</h2>
	<form class="form-horizontal col-xs-6" action="/users/new_user" method="post">
		<h3>Register</h3>
		<input type="hidden" name="action" value="register">
		<div class="form-group">
			<label class="col-xs-3 control-label">Name: </label>
			<div class="col-xs-9">
				<input class="form-control" type="text" name="name">
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-3 control-label">Alias: </label>
			<div class="col-xs-9">
				<input class="form-control" type="text" name="alias">
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-3 control-label">Email: </label>
			<div class="col-xs-9">
				<input class="form-control" type="text" name="email">
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-3 control-label">Password: </label>
			<div class="col-xs-9">
				<input class="form-control" type="password" name="password">
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-3 control-label">Confirm Password: </label>
			<div class="col-xs-9">
				<input class="form-control" type="password" name="confirmPassword">
			</div>
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
			<label class="col-xs-3 control-label">Email: </label>
			<div class="col-xs-9">
				<input class="form-control" type="text" name="email">
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-3 control-label">Password: </label>
			<div class="col-xs-9">
				<input class="form-control" type="password" name="password">
			</div>
		</div>
		<div class="form-group">
			<input class="btn btn-default pull-right" type="submit" value="Login">
		</div>
	</form>
	<span class="text-danger"><?= $this->session->flashdata("login_errors") ?></span>
<?php $this->load->view("partials/footer")?>