<?php

/**
 * @apiGroup           Type
 * @apiName            Invoke
 *
 * @api                {GET} /v1/types/:id Invoke
 * @apiDescription     Endpoint description here...
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiParam           {String} parameters here...
 *
 * @apiSuccessExample  {json} Success-Response:
 * HTTP/1.1 200 OK
 * {
 *     // Insert the response of the request here...
 * }
 */

use App\Containers\AppSection\Type\UI\API\Controllers\FindTypeByIdController;
use Illuminate\Support\Facades\Route;

Route::get('types/{id}', FindTypeByIdController::class)
    ->middleware(['auth:api']);

