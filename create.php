<?php
require 'database.php';
require 'functions.php';

echo " <form action='' method='post' enctype='multipart/form-data'>
<p>Name <input type='text' name='title' value='' REQUIRED=''/></p>
<p>Post <input type='text' name='content' value='' REQUIRED=''/></p>
<p>Upload image <input type='file' name='image' /></p>
<input type='submit' value='ADD'/>
</form>";

if(!empty($_POST['title']) && !empty($_POST['content'])) {

    insert_post($_POST['title'], $_POST['content'], $_FILES['image']);
}

echo "<br /><a href='http://crudlast'>back</a>";
