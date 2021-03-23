<?php 
require_once('controller.php');

$art = new Article_Manager();
$administrator = new Administrator_Manager();
$comment = new Comment_Manager();


if(isset($_GET["action"]) && $_GET["action"] ==='admin'){

    administrator($administrator);
    writeArticle($art);
    WarningComments($comment);

} elseif(isset($_GET["action"]) && $_GET["action"] ==='articles'){

    articlesList($art);

} elseif(isset($_GET["action"]) && $_GET["action"] ==='logout'){

    logout();

}  elseif(isset($_GET["read"])){

    article($art);
    writeComment($comment);
    commentsList($comment);

} else {

    home($art);

}








