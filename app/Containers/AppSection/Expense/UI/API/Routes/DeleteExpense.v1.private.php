<?php

/**
 * @apiGroup           Expense
 * @apiName            DeleteExpense
 *
 * @api                {DELETE} /v1/expenses/:id Delete Expense
 * @apiDescription     Delete an Expense
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiParam           {String} id Identifier of the expense
 *
 * @apiSuccessExample  {json} Success-Response:
 * HTTP/1.1 204 No Content
 * {
 * }
 */

use App\Containers\AppSection\Expense\UI\API\Controllers\DeleteExpenseController;
use Illuminate\Support\Facades\Route;

Route::delete('expenses/{id}', DeleteExpenseController::class)
    ->middleware(['auth:api']);

