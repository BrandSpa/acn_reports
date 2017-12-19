<?php
use PHPUnit\Framework\TestCase;
require str_replace('tests/apis', '', __DIR__) .'/apis/convertloop.php';

class ConvertLoopTest extends TestCase {

  public function testClCreatePerson() {
    $endpoint = 'http://httpbin.org/post';
    $appId = 'appid-123';
    $apiKey = 'apikey-123';

    $data = [
      'email' => 'alejandro@brandspa.com',
      'add_tags' => ['ENGLISH'],
      'pid' => 'c2334'
    ];

    $response = cl_create_person($appId, $apiKey, $data, $endpoint);

    $expected = new stdClass();
    $expected->email = 'alejandro@brandspa.com';
    $expected->add_tags = ['ENGLISH'];
    $expected->pid = 'c2334';

    $this->assertEquals($expected, json_decode($response)->json);
  }

}
