<?php

/**
 * @apiGroup           Category
 * @apiName            GetTopCardExpenses
 *
 * @api                {GET} /v1/Card/top-expenses/{month}/{year} Get Top Card Expenses
 * @apiDescription     Get the top 5 Card with highest expenses for a specific month and year, including percentage of total expenses
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiParam          {Integer} month Month number (1-12)
 * @apiParam          {Integer} year Year (e.g., 2024)
 *
 * @apiSuccessExample  {json} Success-Response:
 * HTTP/1.1 200 OK
 * {
 *     "data": [
 *         {
 *             "id": "1",
 *             "name": "Food",
 *             "total_expenses": 1500.50,
 *             "percentage": 45
 *         },
 *         {
 *             "id": "2",
 *             "name": "Transportation",
 *             "total_expenses": 800.25,
 *             "percentage": 24
 *         }
 *     ]
 * }
 */

use App\Containers\AppSection\Card\UI\API\Controllers\GetTopCardExpensesController;
use Illuminate\Support\Facades\Route;

Route::get('cards/top/expenses', GetTopCardExpensesController::class)
    ->middleware(['auth:api']);
