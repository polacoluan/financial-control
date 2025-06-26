<?php

/**
 * @apiGroup           Card
 * @apiName            FindCardById
 *
 * @api                {GET} /v1/cards/:id Find Card By Id
 * @apiDescription     Find a Card By Id
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
 * HTTP/1.1 200 OK
 * {
 *     "data": {
 *         "object": "Card",
 *         "id": "l5",
 *         "created_at": "2024-12-20T17:43:12.000000Z",
 *         "updated_at": "2024-12-20T17:43:12.000000Z",
 *         "readable_created_at": "1 second ago",
 *         "readable_updated_at": "1 second ago"
 *     },
 *     "meta": {
 *         "include": [],
 *         "custom": []
 *     }
 * }
 */

use App\Containers\AppSection\Card\UI\API\Controllers\FindCardByIdController;
use Illuminate\Support\Facades\Route;

Route::get('cards/{id}', FindCardByIdController::class)
    ->middleware(['auth:api']);

