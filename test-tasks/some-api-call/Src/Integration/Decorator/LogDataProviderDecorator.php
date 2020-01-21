<?php

namespace TestTaskDecorator\Src\Integration\Decorator;

use Exception;
use Psr\Log\LoggerInterface;

class LogDataProviderDecorator extends AbstractDataProviderDecorator
{
    /**
     * @var LoggerInterface
     */
    public $logProvider;

    /**
     * @param LoggerInterface $logger
     */
    public function setLogProvider(LoggerInterface $logger): void
    {
        $this->logProvider = $logger;
    }

    /**
     * {@inheritdoc}
     */
    public function get(array $input): array
    {
        try {
            return parent::get($input);
        } catch (Exception $e) {
            $this->logProvider->critical($e->getMessage());
        }

        return [];
    }
}


