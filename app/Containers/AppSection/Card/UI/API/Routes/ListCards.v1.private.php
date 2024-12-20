<?php

/**
 * @apiGroup           Card
 * @apiName            ListCards
 *
 * @api                {GET} /v1/cards List Cards
 * @apiDescription     Get All Cards
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiSuccessExample  {json} Success-Response:
 * HTTP/1.1 200 OK
 * {
 *     "data": [
 *         {
 *             "object": "Card",
 *             "id": "jR",
 *             "card": "Itau",
 *             "description": "Cartão do Itau",
 *             "created_at": "2024-12-20T16:46:08.000000Z",
 *             "updated_at": "2024-12-20T16:46:08.000000Z",
 *             "readable_created_at": "1 hour ago",
 *             "readable_updated_at": "1 hour ago"
 *         },
 *         {
 *             "object": "Card",
 *             "id": "k5",
 *             "card": "NuBank",
 *             "description": "Cartão do Nubank",
 *             "created_at": "2024-12-20T16:46:08.000000Z",
 *             "updated_at": "2024-12-20T16:46:08.000000Z",
 *             "readable_created_at": "1 hour ago",
 *             "readable_updated_at": "1 hour ago"
 *         },
 *         {
 *             "object": "Card",
 *             "id": "l5",
 *             "card": "Teste",
 *             "description": "Teste",
 *             "created_at": "2024-12-20T17:43:12.000000Z",
 *             "updated_at": "2024-12-20T17:43:12.000000Z",
 *             "readable_created_at": "12 minutes ago",
 *             "readable_updated_at": "12 minutes ago"
 *         },
 *         {
 *             "object": "Card",
 *             "id": "mO",
 *             "card": "Teste Update",
 *             "description": "Teste Update",
 *             "created_at": "2024-12-20T17:45:12.000000Z",
 *             "updated_at": "2024-12-20T17:48:37.000000Z",
 *             "readable_created_at": "10 minutes ago",
 *             "readable_updated_at": "7 minutes ago"
 *         }
 *     ],
 *     "meta": {
 *         "include": [],
 *         "custom": [],
 *         "pagination": {
 *             "total": 4,
 *             "count": 4,
 *             "per_page": 15,
 *             "current_page": 1,
 *             "total_pages": 1,
 *             "links": {}
 *         }
 *     }
 * }
 */

use App\Containers\AppSection\Card\UI\API\Controllers\ListCardsController;
use Illuminate\Support\Facades\Route;

Route::get('cards', ListCardsController::class)
    ->middleware(['auth:api']);

