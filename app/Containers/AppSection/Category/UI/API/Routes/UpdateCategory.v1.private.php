<?php

/**
 * @apiGroup           Category
 * @apiName            UpdateCategory
 *
 * @api                {PATCH} /v1/categories/:id Update a Category
 * @apiDescription     Update the attributes of the Category
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
 * HTTP/1.1 200 OK
 * {
 *     "data": {
 *         "object": "Category",
 *         "id": "zY",
 *         "category": "Teste Update",
 *         "description": "Teste Update",
 *         "created_at": "2024-12-20T17:10:20.000000Z",
 *         "updated_at": "2024-12-20T17:18:17.000000Z",
 *         "readable_created_at": "7 minutes ago",
 *         "readable_updated_at": "1 second ago"
 *     },
 *     "meta": {
 *         "include": [],
 *         "custom": []
 *     }
 * }
 */

use App\Containers\AppSection\Category\UI\API\Controllers\UpdateCategoryController;
use Illuminate\Support\Facades\Route;

Route::patch('categories/{id}', UpdateCategoryController::class)
    ->middleware(['auth:api']);

