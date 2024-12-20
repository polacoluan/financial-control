<?php

/**
 * @apiGroup           Category
 * @apiName            DeleteCategory
 *
 * @api                {DELETE} /v1/categories/:id Delete a Category
 * @apiDescription     Delete a Category
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiParam           {String} id Identifier of the category
 *
 * @apiSuccessExample  {json} Success-Response:
 * HTTP/1.1 204 No Content
 * {
 * }
 */

use App\Containers\AppSection\Category\UI\API\Controllers\DeleteCategoryController;
use Illuminate\Support\Facades\Route;

Route::delete('categories/{id}', DeleteCategoryController::class)
    ->middleware(['auth:api']);

