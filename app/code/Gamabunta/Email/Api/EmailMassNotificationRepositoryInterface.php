<?php

namespace Gamabunta\Email\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Gamabunta\Email\Model\Database\Model\EmailMassNotification as Model;
use Magento\Framework\Phrase;

interface EmailMassNotificationRepositoryInterface
{
    /**
     * Retrieves entity from DB by id
     *
     * @param int $id
     * @return Model|bool
     */
    public function getById($id);

    /**
     * Saves new entity in database
     *
     * Saved model can be returned if second parameter is true or if error happened error will be returned if third parameter is true
     *
     * @param Model $model
     * @param bool $shouldReturnModel - if true saved model will be returned otherwise true will be returned if entity was properly saved
     * @param bool $shouldReturnError
     * @return bool|Model|Phrase|string|null
     */
    public function save(Model $model, $shouldReturnModel = true, $shouldReturnError = true);

    /**
     * Deletes entity from table
     *
     * @param Model $model
     * @return void
     */
    public function delete(Model $model);

    /**
     * Deletes entity by id
     *
     * @param int $id
     * @return void
     */
    public function deleteById($id);

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     */
    public function getList(SearchCriteriaInterface $searchCriteria);
}