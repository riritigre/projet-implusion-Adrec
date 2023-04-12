<?php

use App\Auth;
use App\Connection;
use App\Table\PostTable;

Auth::check();

$pdo = Connection::getPDO();
$table = new PostTable($pdo);
header('Location: ' . $router->url('admin_posts') . '?delete=1');


