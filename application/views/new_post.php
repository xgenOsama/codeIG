<html>
    <head>
        <title></title>
    </head>
    <body>
        <form action="<?=base_url().'posts/new_post'?>" method="POST">
            <p>
                <label for="title">Title:</label>
               <input id='title' type="text" name="title"/>
            </p>
            <p>
                <label for="post">Body:</label>
                <textarea id="post" name="post" cols="30" rows="10" style="resize: none"></textarea>
            </p>
            <p>
                <input type="submit" value="create">
            </p>
        </form>
    </body>
</html>