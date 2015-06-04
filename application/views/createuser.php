<?php if($error == 1 ){ ?>
    <p>An error occured try again.</p>
<?php } ?>

<h1>create user :</h1>
<form action="<?=base_url()?>users/create_user" method="POST">
    <p>email:<input type="text" name="email"/></p>
    <p>username:<input type="text" name="username"/></p>
    <p>password:<input type="text" name="password"/></p>
    <p><input type="submit" value="create"/></p>
</form>