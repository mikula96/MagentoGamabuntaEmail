<?php

namespace Gamabunta\Email\Model\Database\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Gamabunta\Email\Model\Database\Model\EmailMassNotification as Model;

class EmailMassNotification extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('gamabunta_email_mass_notification', Model::ID);
    }
}