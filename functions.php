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

function insert_post($title, $content, $image) {
    global $mysqli;

    $image_name = upload_image($image);
    $sql = "INSERT INTO posts (title, content, image) VALUE ('$title','$content','$image_name')";
    mysqli_query($mysqli, $sql) or die('error' . $mysqli->error);
}

function upload_image($image) {
    if(!empty($image['name'])) {
        $image_name = generate_name($image);
        move_uploaded_file($image['tmp_name'], 'uploads/' . $image_name);
        return $image_name;
    }
}

function generate_name($image) {
    $file_name = uniqid();
    $extension = explode('.', $image['name']);
    $image_name = $file_name . '.' . $extension[1];
    return $image_name;
}

function edit_post($id, $title, $content, $image) {
    global $mysqli;

    $image_name = change_image($id, $image);
    $sql = "UPDATE posts SET title='" . $title . "', content='" . $content . "', image='" . $image_name . "' WHERE id=" . $id;
    mysqli_query($mysqli, $sql) or die('error' . $mysqli->error);
}

function change_image($id, $image) {
    if(!empty($image['name'])) {
        delete_image($id);
        $image_name = upload_image($image);
        return $image_name;
    }
    else {
        delete_image($id);
    }
}

function delete_post($id) {
    global $mysqli;

    delete_image($id);
    $sqlDel = 'DELETE FROM posts WHERE id=' . $id;
    mysqli_query($mysqli, $sqlDel) or die ('error ' . $mysqli->error);
    header('Location: http://crudlast');
}

function delete_image($id) {
    if(get_name_image($id)) {
        $image_name = "uploads/" . get_name_image($id);
        if(file_exists($image_name)) {
            unlink($image_name);
        }
    }
}

function get_name_image($id) {
    global $mysqli;

    $sql = 'SELECT image from posts WHERE id=' . $id;
    $query = mysqli_query($mysqli,$sql) or die ('error ' . $mysqli->error);
    $image_name = mysqli_fetch_assoc($query);
    return $image_name['image'];
}

function get_post($id) {
    global $mysqli;

    $sql = 'SELECT title, content, image FROM posts WHERE id=' . $id;
    $query = mysqli_query($mysqli, $sql);
    $post = mysqli_fetch_assoc($query);
    return $post;
}