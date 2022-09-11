<?php
namespace Gamabunta\Email\Logger;

use Magento\Framework\Logger\Handler\Base;
use Monolog\Logger;

/**
 * Custom logger handler class used by ERP integration module to create and use a custom log file
 * @package Leadit\Gamabunta\Email\Logger
 */
class Handler extends Base
{
    /**
     * Logging level
     * @var int
     */
    protected $loggerType = Logger::INFO;

    /**
     * File name
     * @var string
     */
    public $fileName = '/var/log/gamabunta_email.log';
}
