<?php

/**
 * @apiGroup           Category
 * @apiName            GetTopCategoriesExpenses
 *
 * @api                {GET} /v1/categories/top-expenses/{month}/{year} Get Top Categories Expenses
 * @apiDescription     Get the top 5 categories with highest expenses for a specific month and year, including percentage of total expenses
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
 *     "data": {
 *         "categories": [
 *             {
 *                 "id": "1",
 *                 "name": "Food",
 *                 "total_expenses": 1500.50,
 *                 "percentage": 45.25
 *             },
 *             {
 *                 "id": "2",
 *                 "name": "Transportation",
 *                 "total_expenses": 800.25,
 *                 "percentage": 24.15
 *             }
 *         ],
 *         "total_expenses": 3315.25
 *     }
 * }
 */

use App\Containers\AppSection\Category\UI\API\Controllers\GetTopCategoriesExpensesController;
use Illuminate\Support\Facades\Route;

Route::get('categories/top-expenses/{month}/{year}', GetTopCategoriesExpensesController::class)
    ->middleware(['auth:api']);
