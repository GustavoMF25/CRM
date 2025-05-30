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

namespace Modules\MailClient\Client\Exceptions;

use Exception;
use Throwable;

class FolderNotFoundException extends Exception
{
    public function __construct($message = '', $code = 0, ?Throwable $previous = null)
    {
        parent::__construct(
            "The folder the message belongs to does not exist on remote server. {$message}",
            $code,
            $previous
        );
    }
}
