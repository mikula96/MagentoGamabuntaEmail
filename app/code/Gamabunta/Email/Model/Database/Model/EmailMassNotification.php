<?php

namespace Gamabunta\Email\Model\Database\Model;

use Magento\Framework\Model\AbstractModel;
use Gamabunta\Email\Model\Database\ResourceModel\EmailMassNotification as ResourceModel;

class EmailMassNotification extends AbstractModel
{
    const ID = 'id';
    const EMAIL_TEMPLATE_ID = 'email_template_id';
    const SENDER_EMAIL = 'sender_email';
    const RECEIVER_EMAIL = 'receiver_email';
    const TEMPLATE_VARS = 'template_vars';
    const RETRIES_LEFT = 'retries_left';
    const STORE_ID = 'store_id';

    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }
}