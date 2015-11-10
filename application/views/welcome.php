<?php $this->load->view("partials/header")?>
<div class="container">
	<div class="col-sm-10">
		<div class="row">
			<h2 class="col-sm-6 col-sm-offset-5">have you <strong>read this</strong>?</h2>
		</div>
		<form class="registration form-horizontal col-sm-6" action="/users/new_user" method="post">
			<input type="hidden" name="action" value="register">
			<div class="form-group">
				<label class="col-sm-3 control-label">Name: </label>
				<div class="col-sm-9">
					<input class="form-control" type="text" name="name">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Alias: </label>
				<div class="col-sm-9">
					<input class="form-control" type="text" name="alias">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Email: </label>
				<div class="col-sm-9">
					<input class="form-control" type="text" name="email">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Password: </label>
				<div class="col-sm-9">
					<input class="form-control" type="password" name="password">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Confirm Password: </label>
				<div class="col-sm-9">
					<input class="form-control" type="password" name="confirmPassword">
				</div>
			</div>
			<div class="form-group">
				<input class="pull-right btn btn-default" type="submit" value="Register">
			</div>
			<span class="text-danger"><?= $this->session->flashdata("register_errors") ?></span>
		</form>
		<form class="login form-horizontal col-sm-6" action="/users/login_user" method="post">
			<div class="form-group">
				<input type="hidden" name="action" value="login">
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Email: </label>
				<div class="col-sm-9">
					<input class="form-control" type="text" name="email">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Password: </label>
				<div class="col-sm-9">
					<input class="form-control" type="password" name="password">
				</div>
			</div>
			<div class="form-group">
				<input class="btn btn-default pull-right" type="submit" value="Login">
			</div>
			<span class="text-danger"><?= $this->session->flashdata("login_errors") ?></span>
		</form>
	</div>
<?php $this->load->view("partials/footer")?>