<?php

namespace App\Containers\AppSection\Category\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Category\Actions\ListCategoriesAction;
use App\Containers\AppSection\Category\UI\API\Requests\ListCategoriesRequest;
use App\Containers\AppSection\Category\UI\API\Transformers\CategoryTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class ListCategoriesController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function __invoke(ListCategoriesRequest $request, ListCategoriesAction $action): array
    {
        $categories = $action->run($request);

        return $this->transform($categories, CategoryTransformer::class);
    }
}
