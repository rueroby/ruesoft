<?php
/**
 * Created by JetBrains PhpStorm.
 * User: RueRobi
 * Date: 9/8/12
 * Time: 3:12 PM
 * To change this template use File | Settings | File Templates.
 */

namespace ruesoft\frmwrk\model\util\SessionStorage;

use ruesoft\frmwrk\model\interfaces\ISessionStorage;

class SessionStorage implements  ISessionStorage
{
    public function __construct($cookieName = 'RueSoftPHPSite'){
        session_name($cookieName);
        session_start();
    }

    public function get($key){
        return $_SESSION[$key];
    }

    public function set($key, $value){
        $_SESSION[$key] = $value;
    }
}
