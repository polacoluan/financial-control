<?php

/**
 * @apiGroup           Category
 * @apiName            ListCategories
 *
 * @api                {GET} /v1/categories Get All Categories
 * @apiDescription     Get All Categories
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
 *             "object": "Category",
 *             "id": "zY",
 *             "category": "Teste Update",
 *             "description": "Teste Update",
 *             "created_at": "2024-12-20T17:10:20.000000Z",
 *             "updated_at": "2024-12-20T17:18:17.000000Z",
 *             "readable_created_at": "11 minutes ago",
 *             "readable_updated_at": "3 minutes ago"
 *         }
 *     ],
 *     "meta": {
 *         "include": [],
 *         "custom": [],
 *         "pagination": {
 *             "total": 1,
 *             "count": 1,
 *             "per_page": 15,
 *             "current_page": 1,
 *             "total_pages": 1,
 *             "links": {}
 *         }
 *     }
 * }
 */

use App\Containers\AppSection\Category\UI\API\Controllers\ListCategoriesController;
use Illuminate\Support\Facades\Route;

Route::get('categories', ListCategoriesController::class)
    ->middleware(['auth:api']);

