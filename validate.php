<?php

/*
 * receives async post requests
 * validate $_POST data
 * $_POST['data']
 * $_POST['password']
 *
 * */
session_start();

/*Verified REQUEST METHOD
  If either of two POST variables is empty, return false
*/
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['user']) || empty($_POST['password'])) {
        return false;
    } else {
        /*
         * else set db instance
         * get db instance connection
         * */
        require_once("db.php");
        $user = trim(htmlentities($_POST['user']));
        $password = trim(htmlentities($_POST['password']));

        /*set parents
        use parents to authenticate
        if success, display result in in json format
        else use child's authenticate to override parent's authenticate

         * */
        require_once("authParent.php");
        $authParent = new authParent($user, $password);
        $r = $authParent->authenticate();
        if ($r === false) {
            require_once("authChild.php");
            $authChild = new authChild($user, $password);
            $r2 = $authChild->authenticate();
            echo !empty($r2) ? json_encode(array("user"=>$r2)) : json_encode(array("user"=>false));
        }
        else{
            echo !empty($r) ? json_encode(array("user"=>$r)) : json_encode(array("user"=>false));
        }
    }
}
?>