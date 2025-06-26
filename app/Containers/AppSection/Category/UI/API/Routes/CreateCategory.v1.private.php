<?php

/**
 * @apiGroup           Category
 * @apiName            CreateCategory
 *
 * @api                {POST} /v1/categories Create Category
 * @apiDescription     Create a new category
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiParam           {String} category Name of the Category
 * @apiParam           {String} description Description of the Category
 *
 * @apiSuccessExample  {json} Success-Response:
 * HTTP/1.1 201 Created
 * {
 *     "data": {
 *         "object": "Category",
 *         "id": "zY",
 *         "category": "Teste",
 *         "description": "Teste",
 *         "created_at": "2024-12-20T17:10:20.000000Z",
 *         "updated_at": "2024-12-20T17:10:20.000000Z",
 *         "readable_created_at": "1 second ago",
 *         "readable_updated_at": "1 second ago"
 *     },
 *     "meta": {
 *         "include": [],
 *         "custom": []
 *     }
 * }
 */

use App\Containers\AppSection\Category\UI\API\Controllers\CreateCategoryController;
use Illuminate\Support\Facades\Route;

Route::post('categories', CreateCategoryController::class)
    ->middleware(['auth:api']);

