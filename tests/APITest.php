<?php
use PHPUnit\Framework\TestCase;
use Goutte\Client;

class APITest extends TestCase
{
	protected $client;
	protected $pid;
	
	protected function startClient()
	{
		$this->client = new Client();
		$this->client->setHeader('Accept', 'application/json');
	}
	protected function callApi($input)
	{
		$url = 'http://localhost/api/?' . http_build_query($input);
		$this->client->request('GET', $url);
	}
	protected function assertIfStatusOK()
	{
		$status = $this->client->getResponse()->getStatus();
		$this->assertEquals($status, 200, 'HTTP status not OK.');
	}
	protected function assertIfStatusNotFound()
	{
		$status = $this->client->getResponse()->getStatus();
		$this->assertEquals($status, 404, 'HTTP status not Not found.');
	}
	
	public function testApiOk()
	{
		$this->startClient();
		$this->callApi(['p' => 'test']);
		$this->assertIfStatusOK();
	}
	public function testApiNotFound()
	{
		$this->startClient();
		$this->callApi([]);
		$this->assertIfStatusNotFound();
		
		$this->callApi(['p' => 'test2']);
		$this->assertIfStatusNotFound();
	}
}
?>