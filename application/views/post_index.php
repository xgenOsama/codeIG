<html>
    <head>
        <title></title>
        <style>
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
                border-radius: 25px;
            }
            .post  a {
                color: #5a0099;
                text-decoration: none;
            }
             a:hover a:active a:focus{
                color: #000000;
            }
            .post .date {
                color: darkred;
            }
            .pagination {
                font-size: 2em;
                color: cornflowerblue;
                text-decoration: none;
            }
            .pagination a{
                text-decoration: none;
            }
        </style>
    </head>
 <body>
   <div id="warper">
       <h1>osama app post :</h1>
       <div class="container">
            <h1>blog posts</h1>
           <?php
              if(!isset($posts)){
           ?>
           <p>There is not posts right now</p>
           <?php }else {
              foreach ($posts as $post) {
                  ?>
                  <div class="post">
                  <h2><a href="<?= base_url() ?>posts/post/<?= $post['postID'] ?>"><?= $post['title'] ?></a> | <a href="<?=base_url()?>posts/editpost/<?=$post['postID']?>">Edit</a> | <a href="<?=base_url()?>posts/deletepost/<?=$post['postID']?>">Delete</a></h2>
                  <p><?= substr(strip_tags($post['post']), 0, 200) . ".." ?></p>
                  <p><a href="<?= base_url() ?>posts/post/<?= $post['postID'] ?>">Read more</a></p>
                  <p class="date">published at: <span style="color: #E13300"><?=$post['data_added'] ?></span></p>
                  <hr/>
                  </div>
              <?php
              }
              }
           ?>
       </div>
       <div class="pagination">
           <?= $pages?>
       </div>
   </div>
 </body>
</html>