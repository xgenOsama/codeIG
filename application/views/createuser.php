<?php if($error == 1 ){ ?>
    <p>An error occured try again.</p>
<?php }
    if($this->session->userdata('userID') && $this->session->userdata('user_type') != 'admin'){
        redirect(base_url());
    }
?>

<h1>create user :</h1>
<?= form_open(base_url().'users/create_user') ?>
<!--<form action="<?/*=base_url()*/?>users/create_user" method="POST">-->
    <p>email:<input type="text" name="email"/></p>
   <!-- <p>username:<input type="text" name="username"/></p>-->
    <p>
        username:
        <?php
            $data_form = [
              'name' => 'username',
                'size' => 50,
                'style' => 'border:1px solid black',
                'id' => 'username'
            ];
        echo form_input($data_form);
        ?>
    </p>
    <p><?= form_label('Password','password')?><!--<input type="text" name="password"/>-->
        <?php
            $data = [
                'id' => 'password',
                'name' => 'password',
                'size' => 50,
                'class' => 'blackborder'
            ];
           echo form_password($data);
        ?>
    </p>
    <?php
        if($this->session->userdata('user_type') == 'admin'){
    ?>
     <p> User Type:
         <?php
            $options = [
                '' => '---',
                'admin' => 'Admin',
                'author' => 'Author',
                'user' => 'User'
            ];
         $attr = 'onclick="fucntion()" class="dropdown"';
         echo form_dropdown('user_type',$options,'',$attr);
         ?>
         <!--<select name="user_type">
             <option value="" selected="selected">---</option>
             <option value="admin">Admin</option>
             <option value="author">Author</option>
             <option value="user">User</option>
         </select>-->
     </p>
    <?php } ?>
    <!--<p><input type="submit" value="create"/></p>-->
   <p> <?= form_submit('','register') ?> </p>
<!--</form>-->
<?= form_close() ?>