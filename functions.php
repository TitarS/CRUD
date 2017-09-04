<?php

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

function get_post($id) {
    global $mysqli;

    $sql = 'SELECT title, content, image FROM posts WHERE id = ' . $id;
    $query = mysqli_query($mysqli, $sql);
    $post = mysqli_fetch_assoc($query);
    return $post;
}

function delete_post($id) {
    global $mysqli;

    delete_image($id);
    $sql = 'DELETE FROM posts WHERE id = ' . $id;
    mysqli_query($mysqli, $sql) or die('Error ' . $mysqli->error);
    header('Location: http://crud');
}

function delete_image($id) {
    if(file_exists(get_name_image($id))) {
        unlink(get_name_image($id));
    }
}

function get_name_image($id) {
    if(get_post($id)['image']) {
        $name_image = 'uploads/' . get_post($id)['image'];
    return $name_image;
    }
}

function insert_post($title, $content, $image) {
    global $mysqli;

    $image_name = upload_image($image);
    $sql = "INSERT INTO posts(title, content, image) VALUE ('$title', '$content', '$image_name')";
    mysqli_query($mysqli, $sql) or die ('Error ' . $mysqli->error);
}

function upload_image($image) {
    if(!empty($image['name'])) {
        $image_name = generate_name($image);
        move_uploaded_file($image['tmp_name'], 'uploads/' . $image_name);
        return $image_name;
    }
}

function generate_name($image) {
    $name = uniqid();
    $extension = explode('.', $image['name']);
    $image_name = $name . '.' . $extension[1];
    return $image_name;
}

function edit_post($id, $title, $content, $image) {
    global $mysqli;

    $image_name = change_image($id, $image);
    $sql = "UPDATE posts SET title = '$title', content= '$content', image = '$image_name' WHERE id = $id";
    mysqli_query($mysqli, $sql) or die('Error ' . $mysqli->error);
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