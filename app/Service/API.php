<?php
namespace App\Service;

class API
{
    protected $method;
    protected $headers;

    public function __construct()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->headers = getallheaders();
    }
    public function output($output, $status = 200)
    {
        http_response_code($status);
        if ($output) {
	        if (isset($this->headers['accept'])) {
		        switch ($this->headers['accept']) {
		            default:
		            case 'application/json':
		            case 'text/json':
		            case 'json':
		            	header('Content-type: application/json; charset=utf-8');
		                return json_encode($output);
		            case 'application/xml':
		            case 'text/xml':
		            case 'xml':
		            	header('Content-type: application/xml; charset=utf-8');
		                return $this->xml($output);
		        }
	        } else {
	        	return json_encode($output);
	        }
        }
    }
    public function input($name = null)
    {
        switch ($this->method) {
            case 'GET':
                return get($name);
            case 'POST':
                return post($name);
            default:
                return null;
        }
    }
}
?>
