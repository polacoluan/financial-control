<?php

/**
 * @apiGroup           Card
 * @apiName            CreateCard
 *
 * @api                {POST} /v1/cards Create Card
 * @apiDescription     Create new Card
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiParam           {String} card Name of the card
 * @apiParam           {String} description Description of the card
 *
 * @apiSuccessExample  {json} Success-Response:
 * HTTP/1.1 201 Created
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

use App\Containers\AppSection\Card\UI\API\Controllers\CreateCardController;
use Illuminate\Support\Facades\Route;

Route::post('cards', CreateCardController::class)
    ->middleware(['auth:api']);

