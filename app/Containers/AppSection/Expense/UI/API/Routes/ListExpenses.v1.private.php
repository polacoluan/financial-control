<?php

/**
 * @apiGroup           Expense
 * @apiName            ListExpenses
 *
 * @api                {GET} /v1/expenses List Expenses
 * @apiDescription     Get All Expenses
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 *
 * @apiSuccessExample  {json} Success-Response:
 * HTTP/1.1 200 OK
 * {
 *     "data": [
 *         {
 *             "object": "Expense",
 *             "id": "l5",
 *             "expense": "Teste",
 *             "description": "Teste",
 *             "amount": 10,
 *             "date": "2024-12-20",
 *             "category": "Alimentação",
 *             "type": "Crédito à vista",
 *             "card": null,
 *             "installments": null,
 *             "created_at": "2024-12-20T18:42:53.000000Z",
 *             "updated_at": "2024-12-20T18:42:53.000000Z",
 *             "readable_created_at": "1 second ago",
 *             "readable_updated_at": "1 second ago"
 *         }
 *     ],
 *     "meta": {
 *         "include": [],
 *         "custom": [],
 *         "pagination": {
 *             "total": 1,
 *             "count": 1,
 *             "per_page": 15,
 *             "current_page": 1,
 *             "total_pages": 1,
 *             "links": {}
 *         }
 *     }
 * }
 */

use App\Containers\AppSection\Expense\UI\API\Controllers\ListExpensesController;
use Illuminate\Support\Facades\Route;

Route::get('expenses', ListExpensesController::class)
    ->middleware(['auth:api']);

