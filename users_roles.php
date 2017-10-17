<?php
/**
 * Created by PhpStorm.
 * User: GRENADY
 * Date: 16/10/17
 * Time: 02:20 ص
 */

class users_roles
{
//role_id	role_number	role_name

protected $id;
protected  $role_number;
protected $role_name ;


    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $role_name
     */
    public function setRoleName($role_name)
    {
        $this->role_name = $role_name;
    }

    /**
     * @param mixed $role_number
     */
    public function setRoleNumber($role_number)
    {
        $this->role_number = $role_number;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getRoleName()
    {
        return $this->role_name;
    }

    /**
     * @return mixed
     */
    public function getRoleNumber()
    {
        return $this->role_number;
    
}