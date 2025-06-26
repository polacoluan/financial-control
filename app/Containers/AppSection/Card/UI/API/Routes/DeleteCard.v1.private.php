<?php

/**
 * @apiGroup           Card
 * @apiName            DeleteCard
 *
 * @api                {DELETE} /v1/cards/:id Delete Card
 * @apiDescription     Delete a Card
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiParam           {String} id Identifier of the Card
 *
 * @apiSuccessExample  {json} Success-Response:
 * HTTP/1.1 204 No Content
 * {
 * }
 */

use App\Containers\AppSection\Card\UI\API\Controllers\DeleteCardController;
use Illuminate\Support\Facades\Route;

Route::delete('cards/{id}', DeleteCardController::class)
    ->middleware(['auth:api']);

