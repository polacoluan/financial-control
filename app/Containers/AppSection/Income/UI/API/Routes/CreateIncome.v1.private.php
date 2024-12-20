<?php

/**
 * @apiGroup           Income
 * @apiName            Invoke
 *
 * @api                {POST} /v1/incomes Invoke
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

use App\Containers\AppSection\Income\UI\API\Controllers\CreateIncomeController;
use Illuminate\Support\Facades\Route;

Route::post('incomes', CreateIncomeController::class)
    ->middleware(['auth:api']);
