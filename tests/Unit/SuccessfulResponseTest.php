<?php

use Boatware\Response\Json\ApiResponse;
use Boatware\Response\Json\SuccessfulResponse;

test('class SuccessfulResponse exists', function () {
    $this->assertTrue(class_exists("Boatware\Response\Json\SuccessfulResponse"));
});

it('can create an SuccessfulResponse', function () {
    $successfulResponse = new SuccessfulResponse();
    $this->assertNotNull($successfulResponse);
});

it('is an instance of ApiResponse', function () {
    $successfulResponse = new SuccessfulResponse();
    $this->assertTrue($successfulResponse instanceof ApiResponse);
});

it('has status "OK"', function () {
    $successfulResponse = new SuccessfulResponse();
    $content = $successfulResponse->getContentArray();
    $this->assertTrue(isset($content['status']));
    $this->assertEquals('OK', $content['status']);
});

it('has data', function () {
    $successfulResponse = new SuccessfulResponse(DEFAULT_EXTRA_DATA);
    $content = $successfulResponse->getContentArray();
    $this->assertTrue(isset($content['data']));
    $this->assertEquals($content['data'], DEFAULT_EXTRA_DATA);
});
