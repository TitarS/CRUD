<?php
require 'database.php';
require 'functions.php';

$id = $_GET['id'];
$post = get_post($id);

echo " <form action='' method='post' enctype='multipart/form-data'>
<p>Name <input type='text' name='title' value='" . $post['title']. "' REQUIRED=''/></p>
<p>Post <input type='text' name='content' value='" . $post['content'] . "' REQUIRED=''/></p>
<p>Edit image <input type='file' name='image' /></p>
<input type='submit' value='ADD'/>
</form>";

if(!empty($_POST['title']) && !empty($_POST['content'])) {
    edit_post($id, $_POST['title'], $_POST['content'], $_FILES['image']);
}


echo "<br /><a href='http://crudlast'>back</a>";