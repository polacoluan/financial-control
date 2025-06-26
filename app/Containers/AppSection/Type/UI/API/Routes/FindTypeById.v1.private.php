<?php

/**
 * @apiGroup           Type
 * @apiName            FindTypeById
 *
 * @api                {GET} /v1/types/:id Find Type By Id
 * @apiDescription     Find a Type by Id
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiParam           {String} id Identifier of the type
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

use App\Containers\AppSection\Type\UI\API\Controllers\FindTypeByIdController;
use Illuminate\Support\Facades\Route;

Route::get('types/{id}', FindTypeByIdController::class)
    ->middleware(['auth:api']);

