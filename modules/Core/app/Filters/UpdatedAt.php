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

class UpdatedAt extends DateTime
{
    /**
     * Initialize new UpdatedAt instance.
     */
    public function __construct(string $attribute = 'updated_at', ?string $label = null)
    {
        parent::__construct($attribute, $label ?: __('core::app.updated_at'));

        $this->withoutNullOperators()->withoutIsOperatorOptions([
            'next_year',
            'next_quarter',
            'next_month',
            'next_week',
            'next_day',
            'future',
            'past',
        ]);
    }
}
