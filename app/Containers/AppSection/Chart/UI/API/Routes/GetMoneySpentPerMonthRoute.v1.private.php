<?php

/**
 * @apiGroup           Chart
 * @apiName            GetMoneySpentPerMonth
 *
 * @api                {GET} /v1/charts/money-spent-per-month/:month Get Money Spent Per Month
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

use App\Containers\AppSection\Chart\UI\API\Controllers\GetMoneySpentPerMonthController;
use Illuminate\Support\Facades\Route;

Route::get('charts/money-spent-per-month/{month}', [GetMoneySpentPerMonthController::class, 'GetMoneySpentPerMonth'])
    ->middleware(['auth:api']);

