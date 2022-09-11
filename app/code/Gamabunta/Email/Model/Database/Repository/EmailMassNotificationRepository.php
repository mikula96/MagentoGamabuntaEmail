<?php

namespace Gamabunta\Email\Model\Database\Repository;

use Gamabunta\Email\Api\EmailMassNotificationRepositoryInterface;
use Gamabunta\Email\Logger\Logger;
use Gamabunta\Email\Model\Database\Model\EmailMassNotification as Model;
use Gamabunta\Email\Model\Database\Model\EmailMassNotificationFactory as Factory;
use Gamabunta\Email\Model\Database\ResourceModel\EmailMassNotification as ResourceModel;
use Magento\Framework\Api\Search\SearchResultFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterface;
use Magento\Framework\Phrase;

class EmailMassNotificationRepository implements EmailMassNotificationRepositoryInterface
{
    private $_factory;
    private $_collectionFactory;
    private $_searchResultFactory;
    private $_collectionProcessor;
    private $_logger;
    private $_resourceModel;

    public function __construct(
        Factory                                                                               $factory,
        \Gamabunta\Email\Model\Database\ResourceModel\EmailMassNotification\CollectionFactory $collectionFactory,
        SearchResultFactory                                                                   $searchResultInterfaceFactory,
        CollectionProcessorInterface                                                          $collectionProcessor,
        Logger                                                                                $logger,
        ResourceModel                                                                         $resourceModel
    )
    {
        $this->_factory = $factory;
        $this->_collectionFactory = $collectionFactory;
        $this->_searchResultFactory = $searchResultInterfaceFactory;
        $this->_collectionProcessor = $collectionProcessor;
        $this->_logger = $logger;
        $this->_resourceModel = $resourceModel;
    }

    /**
     * @return Factory
     */
    public function getFactory()
    {
        return $this->_factory;
    }

    /**
     * @inheritDoc
     *
     * @param $id
     * @return bool|Model|null
     */
    public function getById($id)
    {
        $model = $this->_factory->create();
        $this->_resourceModel->load($model, $id);
        if (!$model->getId()) {
            return null;
        }
        return $model;
    }

    /**
     * @inheritDoc
     *
     * @param Model $model
     * @param bool $shouldReturnModel
     * @param bool $shouldReturnError
     * @return bool|Model|Phrase|string|null
     */
    public function save(Model $model, $shouldReturnModel = true, $shouldReturnError = true)
    {
        if (!empty($model)) {
            try {
                $this->_resourceModel->save($model);
            } catch (\Exception $e) {
                $this->_logger->addError("Unable to save model!", ['message' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
                return $shouldReturnModel ? ($shouldReturnError ? $e->getMessage() : null) : false;
            }
            return $shouldReturnModel ? $this->getById($model->getId()) : true;
        }
        return $shouldReturnModel ? ($shouldReturnError ? __("Model to save is empty") :null) : false;
    }

    /**
     * @inheritDoc
     *
     * @param Model $model - entity to delete
     * @return bool
     */
    public function delete(Model $model)
    {
        try {
            $this->_resourceModel->delete($model);
        } catch (\Exception $e) {
            $this->_logger->addError("Unable to delete model!",['message' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            return false;
        }
        return true;
    }

    /**
     * @inheritDoc
     *
     * @param $id - id from entity that should be deleted
     * @return bool
     */
    public function deleteById($id)
    {
        return $this->delete($this->getById($id));
    }

    /**
     * @inheritDoc
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return SearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->_collectionFactory->create();

        $this->_collectionProcessor->process($searchCriteria, $collection);

        /** @var searchResultsInterface $searchResult */
        $searchResult = $this->_searchResultFactory->create();
        $searchResult->setSearchCriteria($searchCriteria);
        $searchResult->setTotalCount($collection->getSize());
        $searchResult->setItems($collection->getData());

        return $searchResult;
    }
}