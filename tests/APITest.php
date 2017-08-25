<?php
use PHPUnit\Framework\TestCase;

class APITest extends TestCase
{
	protected $client;
	
	protected function startClient()
	{
		$this->client = new Client();
		$this->client->setHeader('Accept', 'application/json');
	}
	protected function callApi($input)
	{
		$url = 'http://localhost/money/api/?' . http_build_query($input);
		$this->client->request('GET', $url);
	}
	protected function assertIfStatusOK()
	{
		$status = $this->client->getResponse()->getStatus();
		$this->assertEquals($status, 200, 'HTTP status not OK.');
	}
	
	public function 
}
?>