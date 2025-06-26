<?php

/**
 * @apiGroup           Card
 * @apiName            UpdateCard
 *
 * @api                {PATCH} /v1/cards/:id Update Card
 * @apiDescription     Update an Card
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiParam           {String} card Name of the Card
 * @apiParam           {String} description Description of the Card
 *
 * @apiSuccessExample  {json} Success-Response:
 * HTTP/1.1 200 OK
 * {
 *     "data": {
 *         "object": "Card",
 *         "id": "mO",
 *         "card": "Teste Update",
 *         "description": "Teste Update",
 *         "created_at": "2024-12-20T17:45:12.000000Z",
 *         "updated_at": "2024-12-20T17:48:37.000000Z",
 *         "readable_created_at": "3 minutes ago",
 *         "readable_updated_at": "1 second ago"
 *     },
 *     "meta": {
 *         "include": [],
 *         "custom": []
 *     }
 * }
 */

use App\Containers\AppSection\Card\UI\API\Controllers\UpdateCardController;
use Illuminate\Support\Facades\Route;

Route::patch('cards/{id}', UpdateCardController::class)
    ->middleware(['auth:api']);

