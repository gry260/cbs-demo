<?php

/*child class*/
class authChild extends authParent
{
    /*inherit constructor from parent
    call parent constructor */
    public function __construct($user, $password)
    {
        parent::__construct($user, $password);
    }

    /*
     * child's authenticate method
     * from users_others table
     * */
    public function authenticate()
    {
        global $dbh;
        $q = 'select * from cbs.users_another u where u.user = :USER and
    password = :PASS';
        $sth = $dbh->prepare($q);
        $sth->bindParam(':USER', $this->_user, PDO::PARAM_STR, 100);
        $sth->bindParam(':PASS', $this->_password, PDO::PARAM_STR, 100);
        $sth->execute();
        $count = $sth->rowCount();
        if ($count === 1) {
            $result = $sth->fetch(PDO::FETCH_BOTH);
            parent::setCookies();
            return $result["name"];
        }
        return false;
    }

}

?>