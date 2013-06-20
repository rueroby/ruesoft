<?php
/**
 * Created by JetBrains PhpStorm.
 * User: rudy
 * Date: 4/8/13
 * Time: 7:37 PM
 * To change this template use File | Settings | File Templates.
 */

namespace ruesoft\src\dev\manager;


use ruesoft\src\dev\model\ContactInfo;
use ruesoft\src\dev\model\ContactInfoQuery;

class ContactInfoManager {
    private static $instance = null;
    private function __construct(){}

    public static function getInstance(){
        if (!self::$instance){
            self::$instance = new ContactInfoManager();
        }

        return self::$instance;
    }

    public function getContacts(){
        return ContactInfoQuery::create()->find();
    }

    public function getContactForId($id){
        return ContactInfoQuery::create()->findPk($id);
    }

    public function saveContactInfo(&$contact){
        if ($contact != null && $contact instanceof ContactInfo){
            $contact->save();
        }
    }
}