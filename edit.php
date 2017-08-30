<?php
require 'database.php';
require 'functions.php';

get_value();

echo " <form action='' method='post'>
<p>Name <input type='text' name='title' value='$titleVal' REQUIRED=''/></p>
<p>Post <input type='text' name='content' value='$contentVal' REQUIRED=''/></p>
<input type='submit' value='ADD'/>
</form>";

if(!empty($_POST['title']) && !empty($_POST['content'])) {
    edit_posts();
}

echo "<br /><a href='http://crudlast'>back</a>";