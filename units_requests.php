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
    public function SaveRequest($id,$id_requester, $status_id,$attachment_request_link,$title,$unit_id,$id_responder,$attachment_response_link)
    {

        if(strlen($attachment_request_link)>0){
            $md5file = md5_file($attachment_request_link);
        }else if(strlen($attachment_response_link)>0){
            $md5file = md5_file($attachment_response_link);
        }


        R::ext('xdispense', function ($table_name) {
            return R::getRedBean()->dispense($table_name);
        });
        if ($id > 0) {
           echo 'sfdsf';
            R::exec("UPDATE `units_requests` SET `id_responder` = $id_responder, `response_date` = Now(), `attachment_response_link` = '$attachment_response_link', `file_hash_response` = '$md5file' WHERE `units_requests`.`id` =".$id );

        } else {
             R::exec("INSERT INTO `units_requests` ( `id_requester`, `request_date`, `status_id`, `unit_id`, `attachment_request_link` , `title` , `file_hash_request`) VALUES ( $id_requester,  Now(),$status_id , $unit_id, '$attachment_request_link', '$title','$md5file')");
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
$t=new units_requests();
//
//$t->SaveRequest(0,1,31,'attachments\arabic_unit\rmf.txt','attachments/arabic_unit/arabic_unit/rmf.txt','adfasd',13);
// 1,  '', '2017-10-11
$t->SaveRequest(15,0,0,'','',31,2,'attachments\arabic_unit\res.docx');
