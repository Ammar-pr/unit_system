<?php


require_once 'uqu/db/DatabaseManager.php';
class users_roles
{


    function __construct()
    {

        $db = new DatabaseManager;
        $db->getConnection();

    }

    public  function Save($id, $name, $role_number)
    {

        R::ext('xdispense', function ($table_name) {
            return R::getRedBean()->dispense($table_name);
        });
        if ($id > 0) {
            R::exec('UPDATE user_roles SET role_name="' . $name . '" , role_number="' . $role_number . '" WHERE id = "' . $id . '" ');
        } else {
            R::exec('INSERT INTO user_roles (role_name, role_number) VALUES ("' . $name . '", "' . $role_number . '")');
        }

    }

    public  function fetchWithPK($id)
    {

        if ($id > 0) {
           return  R::exec('select * from  user_roles  WHERE id = "' . $id . '" ');
        }

    }

    public  function fetchAll()
{


    echo  R::exec('select * from  user_roles  ');


}

public  function delete($id){
     if($id>0) {
         return R::exec('delete  from  user_roles  WHERE id = "' . $id . '" ');
     }
}
    public  function deleteAll(){

            return R::exec('delete  from  user_roles   ');
        
    }


}