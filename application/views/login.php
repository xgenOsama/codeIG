<h2>Login:</h2>
<?php if($error == 1 ){ ?>
<p>Your username or password not match.</p>
<?php } ?>

<form action="<?= base_url() ?>users/login" method="POST">
    <p>Username:<input type="text" name="username"/></p>
    <p>Password:<input type="password" name="password"/></p>
    <p<input type="submit" value="login"/></p>
</form>