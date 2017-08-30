<?php
require 'database.php';

function get_all_posts() {
    global $mysqli;
    $sql = 'SELECT * FROM posts';
    $query = mysqli_query($mysqli, $sql);
    $posts = [];
    while($post = mysqli_fetch_assoc($query)) {
        $posts[] = $post;
    }
    return $posts;
}

function insert_posts() {
    global $mysqli;

    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "INSERT INTO posts (title, content) VALUE ('$title','$content')";
    mysqli_query($mysqli, $sql) or die('error' . $mysqli->error);
}

function edit_posts() {
    global $mysqli;

    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "UPDATE posts SET title='$title', content='$content' WHERE id=" . $_GET['id'];
    mysqli_query($mysqli, $sql) or die('error' . $mysqli->error);
    echo "<script>window.location.href='http://crudlast/edit.php?id=" . $_GET['id'] . "'</script>";
}

function get_value() {
    global $mysqli;
    global $titleVal;
    global $contentVal;

    $sqlUpd = 'SELECT title, content FROM posts WHERE id =' . $_GET['id'];
    $query = mysqli_query($mysqli, $sqlUpd);
    $values = mysqli_fetch_assoc($query);
    $titleVal = $values['title'];
    $contentVal = $values['content'];
}

function delete_post() {
    global $mysqli;

    $sqlDel = 'DELETE FROM posts WHERE id=' . $_GET['id'];
    mysqli_query($mysqli, $sqlDel) or die ('error' . $mysqli->error);
    header('Location: http://crudlast');
}

function get_post_for_id() {
    global $mysqli;
    global $post;

    $sql = 'SELECT title, content FROM posts WHERE id=' . $_GET['id'];
    $query = mysqli_query($mysqli, $sql);
    $post = mysqli_fetch_assoc($query);
    return $post;
}