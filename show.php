<?php
require 'database.php';
require 'functions.php';

$post = get_post($_GET['id']);

echo "<h4>" . $post['title'] ."</h4>";
echo "<p>" . $post['content'] . "</p>";

if ($post['image']) {
    echo "<img src = 'uploads/" . $post['image'] . "' width = '500px' height='300px'>";
}

echo "<br /><br /><a href = 'http://crudlast'>назад</a>";