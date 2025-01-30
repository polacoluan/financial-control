<?php

/**
 * @apiGroup           Chart
 * @apiName            GetMoneySpentPerCategoryAction
 *
 * @api                {GET} /v1/charts/money-spent-per-category Get Money Spent Per Category Action
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

use App\Containers\AppSection\Chart\UI\API\Controllers\GetMoneySpentPerCategoryController;
use Illuminate\Support\Facades\Route;

Route::get('charts/money-spent-per-category', [GetMoneySpentPerCategoryController::class, 'GetMoneySpentPerCategory'])
    ->middleware(['auth:api']);

