<?php
namespace App\Contract;

use App\Service\API as APIService;
use App\Definition\Contract;

class API
{
	use Contract;
	
    protected static function newInstance()
    {
        return new APIService();
    }
    public static function output($output, $status = 200)
    {
        $instance = self::getInstance();
        return $instance->output($output, $status);
    }
    public static function input($name = null)
    {
        $instance = self::getInstance();
        return $instance->input($name);
    }
}
?>
