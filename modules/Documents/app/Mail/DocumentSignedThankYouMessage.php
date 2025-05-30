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

namespace Modules\Documents\Mail;

class DocumentSignedThankYouMessage extends DocumentMailable
{
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('documents::mail.thankyou')
            ->with(['content' => $this->document->localizedBrandConfig('document.signed_mail_message')])
            ->subject($this->document->localizedBrandConfig('document.signed_mail_subject'));
    }
}
