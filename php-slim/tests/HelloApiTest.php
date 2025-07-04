<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Psr7\Factory\RequestFactory;


class HelloApiTest extends TestCase
{
    private $app;

    protected function setUp(): void
    {
        $this->app = AppFactory::create();
        
        $this->app->get('/hello', function (Request $request, $response, $args) {
            $payload = json_encode(['message' => 'hello, world!']);
            
            $response->getBody()->write($payload);
            return $response
                ->withHeader('Content-Type', 'application/json');
        });
    }

    public function testHelloEndpoint()
    {
        $request = (new RequestFactory())->createRequest('GET', '/hello');
        $response = $this->app->handle($request);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('application/json', $response->getHeaderLine('Content-Type'));
        
        $body = (string) $response->getBody();
        $data = json_decode($body, true);
        
        $this->assertIsArray($data);
        $this->assertArrayHasKey('message', $data);
        $this->assertEquals('hello, world!', $data['message']);
    }
}