<?php
require 'database.php';
require 'functions.php';

echo " <form action='' method='post'>
<p>Name <input type='text' name='title' value='' REQUIRED=''/></p>
<p>Post <input type='text' name='content' value='' REQUIRED=''/></p>
<input type='submit' value='ADD'/>
</form>";

if(!empty($_POST['title']) && !empty($_POST['content'])) {

    insert_posts();
}

echo "<br /><a href='http://crudlast'>back</a>";