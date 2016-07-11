<?php

/*parent class*/
class authParent
{
    /*user*/
    protected $_user;
    /*password*/
    protected $_password;

    public function __construct($user, $password)
    {
        $this->_user = $user;
        $this->_password = md5($password);
    }

    /*parent authenticate method
   from users table
   */
    public function authenticate()
    {
        global $dbh;
        $q = 'select * from cbs.users u where u.user = :USER and
    password = :PASS';
        $sth = $dbh->prepare($q);
        $sth->bindParam(':USER', $this->_user, PDO::PARAM_STR, 100);
        $sth->bindParam(':PASS', $this->_password, PDO::PARAM_STR, 100);
        $sth->execute();
        $count = $sth->rowCount();
        if ($count === 1) {
            $result = $sth->fetch(PDO::FETCH_BOTH);
            $this->setCookies();
            return $result["name"];
        }
        return false;
    }

    /*set cookies*/
    public function setCookies()
    {
        $lifetime=600;
        setcookie(session_name(),session_id(),time()+$lifetime);
        $_SESSION['signed_in'] = true;
        $_SESSION['username'] = $this->_user;
    }


    /*get users*/
    public function getUser()
    {
        return !empty($this->_user) ? $this->_user : false;
    }

    /*get password*/

    public function getPassword()
    {
        return !empty($this->_password) ? $this->_password : false;
    }

}

?>