<?php

/**
 * @apiGroup           Installment
 * @apiName            Invoke
 *
 * @api                {PATCH} /v1/installments/:id Invoke
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

use App\Containers\AppSection\Installment\UI\API\Controllers\UpdateInstallmentController;
use Illuminate\Support\Facades\Route;

Route::patch('installments/{id}', UpdateInstallmentController::class)
    ->middleware(['auth:api']);

