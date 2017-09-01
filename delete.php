<?php
require 'database.php';
require 'functions.php';

$id = $_GET['id'];
delete_post($id);
