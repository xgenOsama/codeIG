<html>
    <head>
        <title></title>
    </head>
    <body>
        <?php if(isset($success) && $success==1){ ?>
            <div style="color: #ffffff;background: green">
                The post has been successfully edited
            </div>
        <?php }?>
        <form action="<?=base_url()?>posts/editpost/<?= $post['postID']?>" method="POST">
            <p>Title:<input type="text" name="title" value="<?= $post['title']?>"/></p>
            <p>Body: <textarea  name="post" cols="30"  rows="10" style="resize: none"><?= $post['post']?></textarea></p>
            <p><input type="submit" value="update"></p>
        </form>
    </body>
</html>