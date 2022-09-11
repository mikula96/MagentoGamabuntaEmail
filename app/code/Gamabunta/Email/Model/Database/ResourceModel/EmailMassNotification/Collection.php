<?php

namespace Gamabunta\Email\Model\Database\ResourceModel\EmailMassNotification;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Gamabunta\Email\Model\Database\ResourceModel\EmailMassNotification as ResourceModel;
use Gamabunta\Email\Model\Database\Model\EmailMassNotification as Model;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }

}