<?php

use Appletie\Response\Json\ApiResponse;
use Appletie\Response\Json\ErrorResponse;

test('class ErrorResponse exists', function () {
    $this->assertTrue(class_exists("Appletie\Response\Json\ErrorResponse"));
});

it('can create an ErrorResponse', function () {
    $errorResponse = new ErrorResponse(DEFAULT_ERROR_MESSAGE);
    $this->assertNotNull($errorResponse);
});

it('is an instance of ApiResponse', function () {
    $errorResponse = new ErrorResponse(DEFAULT_ERROR_MESSAGE);
    $this->assertTrue($errorResponse instanceof ApiResponse);
});

it('has status "error"', function () {
    $errorResponse = new ErrorResponse(DEFAULT_ERROR_MESSAGE);
    $content = $errorResponse->getContentArray();
    $this->assertTrue(isset($content['status']));
    $this->assertEquals($content['status'], 'error');
});

it('has an error message', function () {
    $errorResponse = new ErrorResponse(DEFAULT_ERROR_MESSAGE);
    $content = $errorResponse->getContentArray();
    $this->assertTrue(isset($content['message']));
    $this->assertEquals($content['message'], DEFAULT_ERROR_MESSAGE);
});

it('has extra data', function () {
    $errorResponse = new ErrorResponse(DEFAULT_ERROR_MESSAGE, DEFAULT_EXTRA_DATA);
    $content = $errorResponse->getContentArray();
    $this->assertTrue(isset($content['extra']));
    $this->assertEquals($content['extra'], DEFAULT_EXTRA_DATA);
});
