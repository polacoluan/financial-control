<?php

/**
 * @apiGroup           Transaction
 * @apiName            GetMonthlySummary
 *
 * @api                {GET} /v1/monthly-summary/:year/:month Get Monthly Summary
 * @apiDescription     Endpoint to retrieve monthly totals for expenses, incomes and savings
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

use App\Containers\AppSection\Transaction\UI\API\Controllers\GetMonthlySummaryController;
use Illuminate\Support\Facades\Route;

Route::get('monthly-summary/{year}/{month}', [GetMonthlySummaryController::class, 'GetMonthlySummary'])
    ->middleware(['auth:api']);
