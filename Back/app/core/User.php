<?php

namespace app\core;

class User
{

    // Variables
    private $table = "user"; // Valeur par défaut
    private $db;
    // Table Content
    private $id = "";
    private $login = "";
    private $pwd = "";
    private $is_admin = 0;
    
    // Functions
    
    
    /**
     * 
     * @param type $tab
     */
    public function __construct($tab = null)
    {
        if (is_null($tab))
        {
            $this->table = $tab;
        }
    }
/**
 * Log a user
 * @param type $login
 * @param type $pwd
 * @return boolean
 */
    public function LogOn($login, $pwd)
    {
        $this->db = new \app\core\Database();
        $this->db->connect();
        $this->db->select('user', 'id', 'is_admin', NULL, 'Login =\'' . $login . '\' AND Pwd =\'' . md5($pwd) .'\'');
        $check = $this->db->getResult();
        if (!empty($check))
        {
            $_SESSION['login'] = $login;
            $_SESSION['id'] = $check[0]['id'];
            $_SESSION['is_admin'] = $check[0]['is_admin'];
            return true;
           
        }
        return false;
    }
    /**
     * 
     * @param type $id
     * @return boolean
     */
    public static function isLogged($id)
    {
        if(isset($id))
        {
            if(!empty($id))
            {
                return TRUE;
            }
        }
        // Modifier 
        header("location:".WEBROOT."/admin/login.php");
        exit();
        //return FALSE;
    }
    
    /**
     * Check if current user is log
     * @param type $id
     */
    public static function isAlreadyLogged($id)
    {
        if(isset($id))
        {
            if(!empty($id))
            {
                header("location:".WEBROOT."/admin/index.php");
                exit();
            }
        }
    }
    
    /**
     * Check if user is Admin
     * @param type $id
     * @param type $login
     * @return boolean
     */
    public static function isAdmin($id, $login)
    {
        $db = new \app\core\Database();
        $db->connect();
        $db->select("user", "*", NULL, 'Id=\''.$id.'\' AND Login=\''.$login.'\'');
        $res = $db->getResult();
        if($res[0]["is_admin"] == '1')
        {
            return TRUE;
        }
        else{
            header("location:".WEBROOT."/admin/index.php");
            exit();
        }
    }
    
    
    /**
     * return a list of user
     * @return type
     */
    public function getListUser()
    {
        $this->db = new \app\core\Database();
        $this->db->connect();
        $this->db->select($this->table, "*");
        $res = $this->db->getResult();
        return $res; // return an array of Users ;
    }
    
/**
 * return User by ID 
 * @param type $id
 */
    
    public function getUserByID($id)
    {
        $this->db = new \app\core\Database();
        $this->db->connect();
        $this->db->select($this->table, "*", NULL, "id = " . $id);
        $res = $this->db->getResult();
        foreach ($res as $values)
        {//There is 1 value
            $this->setId($values["Id"]);
            $this->setLogin($values["Login"]);
            $this->setPwd($values["Pwd"]);
            $this->setMail($values["Mail"]);
            $this->setDateCreation($values["DateCreation"]);
            $this->setIs_admin($values["is_admin"]);
        }
    }

    /**
     * Delete user by current id
     * @param type $id
     * @return boolean
     */
    public function deleteUser($id)
    {
        $this->db = new \app\core\Database();
        $this->db->connect();
        if ($this->db->delete($this->table, "id = " . $id))
        {
            return true;
        } else
        {
            return false;
        }
    }
    
    /**
     * Create new user 
     * @return boolean
     */

    public function createUser()
    {
        $this->db = new \app\core\Database();
        $this->db->connect();
        $check = $this->db->select($this->table, "*", NULL, "Login = " . $this->login);
        if (empty($check))
        {
            $this->db->insert($this->table, array('Login' => $this->login,
                'Pwd' => md5($this->pwd),
                'DateCreation' => $this->dateCreation,
                'is_admin' => $this->is_admin
            ));
            return true;
        }
        return false;
    }
/**
 * Edit current User
 * @return boolean
 */
    public function editUser()
    {
        $this->db = new \app\core\Database();
        $this->db->connect();
        $this->db->update($this->table, array('Login' => $this->login, 
                                              'Pwd' => md5($this->pwd),
                                              'Mail'=> $this->mail,
                                              'is_admin' => $this->is_admin), 'id=' . $this->id);
        $res = "";
        $res = $this->db->getResult();
        if(!empty($res))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
/**
 * return id client
 * @return type
 */
    public function getId()
    {
        return $this->id;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getPwd()
    {
        return $this->pwd;
    }
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setLogin($login)
    {
        $this->login = $login;
        return $this;
    }

    public function setPwd($pwd)
    {
        $this->pwd = $pwd;
        return $this;
    }


    public function getIs_admin()
    {
        return $this->is_admin;
    }

    public function setIs_admin($is_admin)
    {
        $this->is_admin = $is_admin;
        return $this;
    }


}
