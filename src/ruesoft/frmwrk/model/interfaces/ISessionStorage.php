<?php
/**
 * Created by JetBrains PhpStorm.
 * User: RueRobi
 * Date: 9/8/12
 * Time: 3:19 PM
 * To change this template use File | Settings | File Templates.
 */

namespace ruesoft\frmwrk\model\interfaces;

interface ISessionStorage
{
    function get($key);
    function set($key, $value);
}
