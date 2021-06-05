<?php

use Boatware\Response\Json\ApiResponse;
use Symfony\Component\HttpFoundation\JsonResponse;

test('class ApiResponse exists', function () {
    $this->assertTrue(class_exists("Boatware\Response\Json\ApiResponse"));
});

it('can create an ApiResponse', function () {
    $apiResponse = new ApiResponse();
    $this->assertNotNull($apiResponse);
});

it('is an instance of JsonResponse', function () {
    $apiResponse = new ApiResponse();
    $this->assertTrue($apiResponse instanceof JsonResponse);
});

it('adds meta data', function () {
    $apiResponse = new ApiResponse();
    $contentJson = $apiResponse->getContent();
    $content = json_decode($contentJson, true);
    $this->assertTrue(isset($content['meta']));
});

it('adds timestamp to meta data', function () {
    $apiResponse = new ApiResponse();
    $contentJson = $apiResponse->getContent();
    $content = json_decode($contentJson, true);
    $this->assertTrue(isset($content['meta']['timestamp']));
});

it('has method getTimestamp', function () {
    $apiResponse = new ApiResponse();
    $methods = get_class_methods($apiResponse);
    $this->assertTrue(in_array('getTimestamp', $methods));
});

it('has method getContentArray', function () {
    $apiResponse = new ApiResponse();
    $methods = get_class_methods($apiResponse);
    $this->assertTrue(in_array('getContentArray', $methods));
});

test('method getContentArray returns array', function () {
    $apiResponse = new ApiResponse();
    $contentAsArray = $apiResponse->getContentArray();
    $this->assertIsArray($contentAsArray);
});
