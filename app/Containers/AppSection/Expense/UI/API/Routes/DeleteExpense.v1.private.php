<?php

/**
 * @apiGroup           Expense
 * @apiName            Invoke
 *
 * @api                {DELETE} /v1/expenses/:id Invoke
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

use App\Containers\AppSection\Expense\UI\API\Controllers\DeleteExpenseController;
use Illuminate\Support\Facades\Route;

Route::delete('expenses/{id}', DeleteExpenseController::class)
    ->middleware(['auth:api']);

