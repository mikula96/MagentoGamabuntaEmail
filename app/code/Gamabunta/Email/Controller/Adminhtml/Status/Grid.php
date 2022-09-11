<?php

namespace Gamabunta\Email\Controller\Adminhtml\Status;

use Gamabunta\Email\Constants\Resources;
use Gamabunta\Email\Logger\Logger;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;

class Grid extends Action
{
    private $logger;

    public function __construct(
        Context $context,
        Logger $logger
    )
    {
        parent::__construct($context);
        $this->logger = $logger;
    }


    public function execute()
    {
        $this->logger->addInfo("Gamabunta email controller START");

        $page = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $page->getConfig()->getTitle()->set(__('Email Status'));

        $this->logger->addInfo("Gamabunta email controller END");
        return $page;
    }

    /**
     * @inheritDoc
     *
     * @return bool
     */
    protected function _isAllowed(): bool
    {
        return $this->_authorization->isAllowed(Resources::ADMIN_EMAIL);
    }
}