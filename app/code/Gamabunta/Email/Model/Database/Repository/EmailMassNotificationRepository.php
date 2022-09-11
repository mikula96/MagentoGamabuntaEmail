<?php

namespace Gamabunta\Email\Model\Database\Repository;

use Gamabunta\Email\Api\EmailMassNotificationRepositoryInterface;
use Gamabunta\Email\Model\Database\Model\EmailMassNotification as Model;
use Magento\Framework\Api\SearchCriteriaInterface;

class EmailMassNotificationRepository implements EmailMassNotificationRepositoryInterface
{

    public function getById($id)
    {
        // TODO: Implement getById() method.
    }

    public function save(Model $model, $shouldReturnModel = true, $shouldReturnError = true)
    {
        // TODO: Implement save() method.
    }

    public function delete(Model $model)
    {
        // TODO: Implement delete() method.
    }

    public function deleteById($id)
    {
        // TODO: Implement deleteById() method.
    }

    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        // TODO: Implement getList() method.
    }
}