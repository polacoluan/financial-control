<?php

/**
 * @apiGroup           Expense
 * @apiName            Invoke
 *
 * @api                {GET} /v1/expense-with-installments/:year/:month Invoke
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

use App\Containers\AppSection\Expense\UI\API\Controllers\ListExpenseWithInstallmentsController;
use Illuminate\Support\Facades\Route;

Route::get('expenses/with-installments/{year}/{month}', ListExpenseWithInstallmentsController::class)
    ->middleware(['auth:api']);
