<?php

/**
 * @apiGroup           Category
 * @apiName            FindCategoryById
 *
 * @api                {GET} /v1/categories/:id Find Category By Id
 * @apiDescription     Find a Category by Id
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiParam           {String} Id Identifier of the Category
 *
 * @apiSuccessExample  {json} Success-Response:
 * HTTP/1.1 200 OK
 * {
 *     "data": {
 *         "object": "Category",
 *         "id": "zY",
 *         "category": "Teste Update",
 *         "description": "Teste Update",
 *         "created_at": "2024-12-20T17:10:20.000000Z",
 *         "updated_at": "2024-12-20T17:18:17.000000Z",
 *         "readable_created_at": "10 minutes ago",
 *         "readable_updated_at": "2 minutes ago"
 *     },
 *     "meta": {
 *         "include": [],
 *         "custom": []
 *     }
 * }
 */

use App\Containers\AppSection\Category\UI\API\Controllers\FindCategoryByIdController;
use Illuminate\Support\Facades\Route;

Route::get('categories/{id}', FindCategoryByIdController::class)
    ->middleware(['auth:api']);

