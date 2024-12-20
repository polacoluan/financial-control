<?php

/**
 * @apiGroup           Type
 * @apiName            ListTypes
 *
 * @api                {GET} /v1/types List Types
 * @apiDescription     Get All Types
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
 *             "object": "Type",
 *             "id": "jR",
 *             "type": "Crédito à vista",
 *             "description": "Desepesas pagas à vista",
 *             "created_at": "2024-12-20T16:46:19.000000Z",
 *             "updated_at": "2024-12-20T16:46:19.000000Z",
 *             "readable_created_at": "1 hour ago",
 *             "readable_updated_at": "1 hour ago"
 *         },
 *         {
 *             "object": "Type",
 *             "id": "k5",
 *             "type": "Débito",
 *             "description": "Desepesas pagas no débito",
 *             "created_at": "2024-12-20T16:46:19.000000Z",
 *             "updated_at": "2024-12-20T16:46:19.000000Z",
 *             "readable_created_at": "1 hour ago",
 *             "readable_updated_at": "1 hour ago"
 *         },
 *         {
 *             "object": "Type",
 *             "id": "l5",
 *             "type": "Financiamento",
 *             "description": "Desepesas financiadas",
 *             "created_at": "2024-12-20T16:46:19.000000Z",
 *             "updated_at": "2024-12-20T16:46:19.000000Z",
 *             "readable_created_at": "1 hour ago",
 *             "readable_updated_at": "1 hour ago"
 *         },
 *         {
 *             "object": "Type",
 *             "id": "mO",
 *             "type": "Parcelado",
 *             "description": "Desepesas parceladas",
 *             "created_at": "2024-12-20T16:46:19.000000Z",
 *             "updated_at": "2024-12-20T16:46:19.000000Z",
 *             "readable_created_at": "1 hour ago",
 *             "readable_updated_at": "1 hour ago"
 *         },
 *         {
 *             "object": "Type",
 *             "id": "nR",
 *             "type": "Pix",
 *             "description": "Desepesas pagas pelo pix",
 *             "created_at": "2024-12-20T16:46:19.000000Z",
 *             "updated_at": "2024-12-20T16:46:19.000000Z",
 *             "readable_created_at": "1 hour ago",
 *             "readable_updated_at": "1 hour ago"
 *         },
 *         {
 *             "object": "Type",
 *             "id": "oj",
 *             "type": "Teste",
 *             "description": "Teste",
 *             "created_at": "2024-12-20T18:06:30.000000Z",
 *             "updated_at": "2024-12-20T18:06:30.000000Z",
 *             "readable_created_at": "4 minutes ago",
 *             "readable_updated_at": "4 minutes ago"
 *         }
 *     ],
 *     "meta": {
 *         "include": [],
 *         "custom": [],
 *         "pagination": {
 *             "total": 6,
 *             "count": 6,
 *             "per_page": 15,
 *             "current_page": 1,
 *             "total_pages": 1,
 *             "links": {}
 *         }
 *     }
 * }
 */

use App\Containers\AppSection\Type\UI\API\Controllers\ListTypesController;
use Illuminate\Support\Facades\Route;

Route::get('types', ListTypesController::class)
    ->middleware(['auth:api']);

