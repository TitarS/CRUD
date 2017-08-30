<?php
require 'database.php';
require 'functions.php';

$posts = get_all_posts();

foreach($posts as $post) {
    echo "<a href='/show.php?id=" . $post['id'] . "'>" . $post['title'] . "</a>";
    echo " ----- <a href='/delete.php?id=" . $post['id'] . "'>Delete</a>";
    echo " ----- <a href='edit.php?id=" . $post['id'] . "'>Change</a><br /><br />";
}

echo "<br /><br /><a href='/create.php'>Добавить статью</a>";