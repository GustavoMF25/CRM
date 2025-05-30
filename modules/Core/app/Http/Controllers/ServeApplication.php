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

namespace Modules\Core\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class ServeApplication extends Controller
{
    /**
     * Application main view.
     */
    public function __invoke(): View
    {
        return view('core::app');
    }
}
