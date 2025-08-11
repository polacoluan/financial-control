<?php

/**
 * @apiGroup           Expense
 * @apiName            ListExpensesByMonthYearAndType
 *
 * @api                {GET} /v1/expenses/by-type/{type_id}/{year}/{month} List Expenses By Month Year And Type
 * @apiDescription     Get expenses filtered by month, year and type
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiParam           {String} type_id Type identifier
 * @apiParam           {Integer} year Year (e.g., 2024)
 * @apiParam           {Integer} month Month number (1-12)
 *
 * @apiSuccessExample  {json} Success-Response:
 * HTTP/1.1 200 OK
 * {
 *     "data": []
 * }
 */

use App\Containers\AppSection\Expense\UI\API\Controllers\ListExpensesByMonthYearAndTypeController;
use Illuminate\Support\Facades\Route;

Route::get('expenses/by-type/{type_id}', ListExpensesByMonthYearAndTypeController::class)
    ->middleware(['auth:api']);
