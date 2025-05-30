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

namespace Modules\Deals\Http\Resources;

use Illuminate\Http\Request;
use Modules\Core\Resource\JsonResource;

/** @mixin \Modules\Deals\Models\Stage */
class StageResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Modules\Core\Http\Requests\ResourceRequest  $request
     */
    public function toArray(Request $request): array
    {
        return $this->withCommonData([
            'name' => $this->name,
            'win_probability' => $this->win_probability,
            'display_order' => $this->display_order,
            'pipeline_id' => $this->pipeline_id,
        ], $request);
    }
}
