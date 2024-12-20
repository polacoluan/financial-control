<?php

/**
 * @apiGroup           Card
 * @apiName            Invoke
 *
 * @api                {PATCH} /v1/cards/:id Invoke
 * @apiDescription     Endpoint description here...
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiParam           {String} parameters here...
 *
 * @apiSuccessExample  {json} Success-Response:
 * HTTP/1.1 200 OK
 * {
 *     // Insert the response of the request here...
 * }
 */

use App\Containers\AppSection\Card\UI\API\Controllers\UpdateCardController;
use Illuminate\Support\Facades\Route;

Route::patch('cards/{id}', UpdateCardController::class)
    ->middleware(['auth:api']);

