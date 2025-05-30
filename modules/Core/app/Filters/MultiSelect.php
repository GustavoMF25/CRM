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

namespace Modules\Core\Filters;

class MultiSelect extends Select
{
    public bool $allowMultipleOptionsInQuickFilter = true;

    /**
     * Defines a filter type
     */
    public function type(): string
    {
        return 'multi-select';
    }
}
