<?php
require 'database.php';
require 'functions.php';

/**return $post*/
get_post_for_id();

echo "<h4>" . $post['title'] ."</h4>";
echo "<p>" . $post['content'] . "</p>";

echo "<a href = 'http://crudlast'>назад</a>";