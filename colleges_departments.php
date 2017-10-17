<?php
/**
 * Created by PhpStorm.
 * User: GRENADY
 * Date: 15/10/17
 * Time: 02:40 م
 */
require_once 'scripts/RedBeanPHP/RedBean_IBeanFormatter.php';
class colleges_departments
{

    protected $dept_id;
    protected $college_id;
    protected $department_name;




     function __construct($dept_id,$college_id,$department_name) {
        $this->college_id = $college_id;
        $this->department_name = $department_name;
        $this->dept_id = $dept_id;
    }

    /**
     * @param mixed $college_id
     */
    public function setCollegeId($college_id)
    {
        $this->college_id = $college_id;
    }

    /**
     * @param mixed $department_name
     */
    public function setDepartmentName($department_name)
    {
        $this->department_name = $department_name;
    }

    /**
     * @param mixed $dept_id
     */
    public function setDeptId($dept_id)
    {
        $this->dept_id = $dept_id;
    }

    /**
     * @return mixed
     */
    public function getDepartmentName()
    {
        return $this->department_name;
    }

    /**
     * @return mixed
     */
    public function getCollegeId()
    {
        return $this->college_id;
    }

    /**
     * @return mixed
     */
    public function getDeptId()
    {
        return $this->dept_id;
    }


    function update(){

try {
   $status= R::exec( 'update collegesdepartments set department_name="'.$this->getDepartmentName().'"   where id="'.$this->getDeptId().'"' );
  if($status==0){
    echo "can't update the record ";
  }
        R::close();
    }catch (SQLiteException $sq){
      $sq->getMessage();
}


    }


public  function get_colleges_depratment_object()
{

    // to check specfic depratment for any clolleges
    try {
        $id=$this->getDeptId();

        $row = R::getAll("SELECT * FROM collegesdepartments where id='".$this->getDeptId()."' ");
        $colleges_dep = R::convertToBeans( 'colleges_departments', $row );

         if(count($row)>0){
             return $row;
         }else {
             return null;
         }
}catch (SQLiteException $sq){
    $sq->getMessage();
}
    }



    public function delete_colleges_depratment_object() {

        try {
          if(  R::exec( 'delete from  collegesdepartments    WHERE id ="'.$this->getDeptId().'" ')==1){

          }else{
              echo"there is issue with delete";
          }
        }catch (SQLiteException $sq){
            $sq->getMessage();
        }
    }


    public function delete_colleges_depratment_All_records() {

        try {
            if(  R::exec( 'delete from  collegesdepartments  ')==1){

            }else{
                echo"there is issue with delete";
            }
        }catch (SQLiteException $sq){
            $sq->getMessage();
        }
    }


    function insert() {
        $colleges_departments= R::dispense('collegesdepartments');



        $colleges_departments->departmentname=$this->getDepartmentName();
        $colleges_departments->college_id=8;

        $id_redbean_colleges_dep_id=  R::store($colleges_departments); // store is done
        if($id_redbean_colleges_dep_id>0){

        }else {
            echo "the data cannot be inserted in the table colleges departments";
        }
    }



}
