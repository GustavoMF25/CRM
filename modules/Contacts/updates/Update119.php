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

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Updater\UpdatePatcher;

return new class extends UpdatePatcher
{
    public function run(): void
    {
        if (! $this->getPhonesTableNumberColumnIndexName()) {
            Schema::table('phones', function (Blueprint $table) {
                $table->index('number');
            });
        }
    }

    public function shouldRun(): bool
    {
        return ! $this->getPhonesTableNumberColumnIndexName();
    }

    protected function getPhonesTableNumberColumnIndexName()
    {
        foreach ($this->getColumnIndexes('phones', 'number') as $index) {
            if (str_ends_with($index['name'], 'number_index') && $index['type'] == 'btree') {
                return $index['name'];
            }
        }
    }
};
