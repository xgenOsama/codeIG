<html>
    <head>
        <title>

        </title>
        <style>
         p .error{
             color: #A70000;
         }
         body{
             width: 700px;
             position: relative;
             margin: auto;
             border: dotted #4F5155 3px;
             padding: 20px;
             clear: both;
         }
         .post{
             background-color: #B3B4BD;
             margin-bottom: 10px;
             padding: 20px;
         }
         .post a {
             color: #5a0099;
             text-decoration: none;
         }
         a:hover a:active a:focus{
             color: #000000;
         }
         .post .date {
             color: darkred;
         }
        </style>
    </head>
    <body>
        <div id="warpper">
            <h1>osama Bank's blog</h1>
            <div id="container">
                <?php /*echo var_dump($post); */?>
               <?php if(empty($post)){ ?>
                   <p class="error">This page loaded incorrectly</p>
                <?php } else{ ?>
                   <div class="post">
                    <h2><?= $post['title'] ?></h2>
                       <p><?= $post['post'] ?></p>
                       <p class="date">published at: <span style="color: #E13300"><?=$post['data_added'] ?></span></p>
                   </div>
                   <hr>
                   <h2>Comments</h2>
                   <?php if(count($comments) > 0) { ?>
                   <?php foreach($comments as $comment){   ?>
                    <p><strong><?=$comment['username'] ?></strong> said at <?=date('m/d/Y H:i A',strtotime($comment['date_added'])) ?><br/>
                    <?=$comment['comment']?>
                     <a href="<?=base_url()?>comments/delete_comment/<?=$post['postID']?>/<?=$comment['commentID']?>">Delete</a>
                    </p>
                    <hr/>
                    <?php } ?>

                    <?php }else{ ?>
                       <p>There are currently no comment</p>
                   <?php }?>
                   <?= form_open(base_url().'comments/add_comment/'.$post['postID']) ?>
                   <?php
                   $data_form = [
                       'name' => 'comment'
                   ];
                   echo form_textarea($data_form);
                   ?>
                   <p><?= form_submit('','Add comment') ?></p>
                   <?=form_close() ?>
                <?php } ?>
            </div>
        </div>
    </body>
</html>
