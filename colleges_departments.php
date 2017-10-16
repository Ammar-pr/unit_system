<?php
/**
 * Created by PhpStorm.
 * User: GRENADY
 * Date: 15/10/17
 * Time: 02:40 م
 */

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
        R::exec( 'update colleges_departments set department_name="'.$this->getDepartmentName().'"   where dept_id="'.$this->getDeptId().'"' );

        R::close();
    }catch (SQLiteException $sq){
      $sq->getMessage();
}
    }




}
?>