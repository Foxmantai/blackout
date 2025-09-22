<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Test
    Route::post('tests/media', 'TestApiController@storeMedia')->name('tests.storeMedia');
    Route::apiResource('tests', 'TestApiController');
});
