<?php
require_once('connection.php');

function getTodoList()
{
    return getAllRecords();
}

function getSelectedTodo($id)
{
    return getTodoTextById($id); 
}

function savePostedData($post)
{
    $path = getRefererPath();
    switch ($path) {
        case '/test_app/new.php':
            createTodoData($post['content']);
            break;
        case '/test_app/edit.php':
            updateTodoData($post);
            break;
        case '/test_app/index.php': // 追記
            deleteTodoData($post['id']); // 追記
            break; // 追記
        default:
            break;
    }
}

function getRefererPath()
{
    $urlArray = parse_url($_SERVER['HTTP_REFERER']);
    return $urlArray['path'];
}

