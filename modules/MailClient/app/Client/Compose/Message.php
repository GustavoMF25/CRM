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

namespace Modules\MailClient\Client\Compose;

class Message extends AbstractComposer
{
    /**
     * Send a new message.
     *
     * @return \Modules\MailClient\Client\Contracts\MessageInterface
     */
    public function send()
    {
        return $this->client->send();
    }
}
