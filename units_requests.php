<?php
/**
 * Created by PhpStorm.
 * User: GRENADY
 * Date: 21/10/17
 * Time: 09:18 م
 */
require_once ('scripts\RedBeanPHP\rb.php');
class units_requests
{
    public function __construct()
    {


        if( !R::testConnection()) {
            R::setup('mysql:host=localhost;dbname=unit',
                'root', 'dwddwddwd');


        }

    }

    public function SaveRequest($id,$id_requester, $status_id,$filename,$attachment_request_link,$title,$unit_id)
    {
        $info = getdate();
        $date = $info['mday'];
        $month = $info['mon'];
        $year = $info['year'];
        $hour = $info['hours'];
        $min = $info['minutes'];
        $sec = $info['seconds'];

        $current_date = "$date:$month:$year : $hour:$min:$sec";


        $md5file = md5_file($filename);


        R::ext('xdispense', function ($table_name) {
            return R::getRedBean()->dispense($table_name);
        });
        if ($id > 0) {
        } else {
            return R::exec("INSERT INTO `units_requests` ( `id_requester`, `request_date`, `status_id`, `unit_id`, `attachment_request_link` , `title` , `file_hash_request`) VALUES ( $id_requester,  Now(),$status_id , $unit_id, '$attachment_request_link', '$title','$md5file')");
        }

    }

    public function fetchWithPK($id)
    {

        if ($id > 0) {
            return R::load('units_requests',$id);
        }else {
            echo "the id is empty";
        }


    }

    public function fetchAll()
    {


        return R::getAll( 'SELECT * FROM units_requests' );



    }
    public function delete($id)
    {
        if ($id > 0) {
            return R::exec("DELETE FROM `units_requests` WHERE id =".$id );
        }
    }

    public function deleteAll()
    {

        return R::exec("DELETE FROM `units_requests` ");

    }





}

//$t=new units_requests();
//
//$t->SaveRequest(0,1,31,'attachments\arabic_unit\rmf.txt','attachments/arabic_unit/arabic_unit/rmf.txt','adfasd',13);
// 1,  '', '2017-10-11 
