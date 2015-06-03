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
                <?php } ?>
            </div>
        </div>
    </body>
</html>