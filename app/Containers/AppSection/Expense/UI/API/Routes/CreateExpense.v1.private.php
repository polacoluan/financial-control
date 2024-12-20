<?php

/**
 * @apiGroup           Expense
 * @apiName            CreateExpense
 *
 * @api                {POST} /v1/expenses Create Expense
 * @apiDescription     Create a new Expense
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiParam           {String} expense Name of the expense
 * @apiParam           {String} description Description of the expense
 * @apiParam           {Double} amount Amount of the expense
 * @apiParam           {Date} date Date of the expense
 * @apiParam           {String} category_id Category of the expense
 * @apiParam           {String} type_id Type of the expense
 * @apiParam           {String} card_id Card used in the expense
 * @apiParam           {String} installments Installments of in the expense
 *
 * @apiSuccessExample  {json} Success-Response:
 * HTTP/1.1 201 Created
 * {
 *     "data": {
 *         "object": "Expense",
 *         "id": "l5",
 *         "expense": "Teste",
 *         "description": "Teste",
 *         "amount": 10,
 *         "date": "2024-12-20",
 *         "category": "Alimentação",
 *         "type": "Crédito à vista",
 *         "card": null,
 *         "installments": null,
 *         "created_at": "2024-12-20T18:42:53.000000Z",
 *         "updated_at": "2024-12-20T18:42:53.000000Z",
 *         "readable_created_at": "1 second ago",
 *         "readable_updated_at": "1 second ago"
 *     },
 *     "meta": {
 *         "include": [],
 *         "custom": []
 *     }
 * }
 */

use App\Containers\AppSection\Expense\UI\API\Controllers\CreateExpenseController;
use Illuminate\Support\Facades\Route;

Route::post('expenses', CreateExpenseController::class)
    ->middleware(['auth:api']);

