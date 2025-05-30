<?php
/**
 * Concord CRM - https://www.concordcrm.com
 *
 * @version   1.5.1
 *
 * @link      Releases - https://www.concordcrm.com/releases
 * @link      Terms Of Service - https://www.concordcrm.com/terms
 *
 * @copyright Copyright (c) 2022-2024 KONKORD DIGITAL
 */

namespace Modules\Core\Actions;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Support\Collection;
use Modules\Core\Http\Requests\ActionRequest;
use Modules\Core\Http\Requests\ResourceRequest;

class RestoreAction extends Action
{
    /**
     * Indicates that the action does not have confirmation dialog.
     */
    public bool $withoutConfirmation = true;

    /**
     * Handle method.
     */
    public function handle(Collection $models, ActionFields $fields): void
    {
        /** @var \Modules\Core\Resource\Resource */
        $resource = $models->first()->resource();

        /** @var \Modules\Core\Http\Requests\ResourceRequest */
        $request = app(ResourceRequest::class)->setResource($resource->name());

        foreach ($models as $model) {
            $resource->restore($model, $request);
        }
    }

    /**
     * @param  \Illuminate\Database\Eloquent\Model  $model
     */
    public function authorizedToRun(ActionRequest $request, $model): bool
    {
        if (is_callable($this->canRunCallback)) {
            return parent::authorizedToRun($request, $model);
        }

        return $request->user()->can('view', $model);
    }

    /**
     * Query the models for execution.
     */
    protected function findModelsForExecution(array $ids, Builder $query): EloquentCollection
    {
        return $query->withTrashed()->findMany($ids);
    }

    /**
     * Action name.
     */
    public function name(): string
    {
        return __('core::app.soft_deletes.restore');
    }
}
