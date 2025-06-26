<?php

/**
 * @apiGroup           Type
 * @apiName            DeleteType
 *
 * @api                {DELETE} /v1/types/:id Delete Type
 * @apiDescription     Delete a Type
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiParam           {String} id Identifier of the Type
 *
 * @apiSuccessExample  {json} Success-Response:
 * HTTP/1.1 204 No Content
 * {
 * }
 */

use App\Containers\AppSection\Type\UI\API\Controllers\DeleteTypeController;
use Illuminate\Support\Facades\Route;

Route::delete('types/{id}', DeleteTypeController::class)
    ->middleware(['auth:api']);

