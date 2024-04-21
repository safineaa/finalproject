
<?php $this->view('includes/header', $data); ?>

<div class="mx-auto col-md-4 bg-light shadow m-4 p-4 g-3 border" >

<h1>Sign Up</h1>
<form method="post">
				
	<input class="form-control" value="<?=old_value('username')?>" name="username" placeHolder="Username"><br>
	<div><small class="text-danger"><?=$user->getError('username')?></small></div><br>
			
	<input class="form-control" value="<?=old_value('email')?>" name="email" placeHolder="Email"><br>
	<div><small class="text-danger"><?=$user->getError('email')?></small></div><br>
			
	<input class="form-control" value="<?=old_value('password')?>" name="password" placeHolder="Password"><br>
	<div><small class="text-danger"><?=$user->getError('password')?></small></div><br>

	<button class="btn btn-primary">Signup</button>
</form>

</div>

<?php $this->view('includes/footer', $data); ?>