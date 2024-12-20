<?php

/**
 * @apiGroup           Type
 * @apiName            CreateType
 *
 * @api                {POST} /v1/types Create Type
 * @apiDescription     Create a new Type
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiParam           {String} type Name of the type
 * @apiParam           {String} description Description of the type
 *
 * @apiSuccessExample  {json} Success-Response:
 * HTTP/1.1 200 OK
 * {
 *     "data": {
 *         "object": "Type",
 *         "id": "oj",
 *         "type": "Teste",
 *         "description": "Teste",
 *         "created_at": "2024-12-20T18:06:30.000000Z",
 *         "updated_at": "2024-12-20T18:06:30.000000Z",
 *         "readable_created_at": "1 second ago",
 *         "readable_updated_at": "1 second ago"
 *     },
 *     "meta": {
 *         "include": [],
 *         "custom": []
 *     }
 * }
 */

use App\Containers\AppSection\Type\UI\API\Controllers\CreateTypeController;
use Illuminate\Support\Facades\Route;

Route::post('types', CreateTypeController::class)
    ->middleware(['auth:api']);

