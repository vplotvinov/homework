<?php

namespace TestTaskDecorator\Src\Integration\Decorator;

use TestTaskDecorator\Src\Integration\Provider\DataProviderInterface;

abstract class AbstractDataProviderDecorator implements DataProviderInterface {

    /**
     * @var DataProviderInterface
     */
    protected $dataProvider;

    public function __construct(DataProviderInterface $dataProvider)
    {
        $this->dataProvider = $dataProvider;
    }

    /**
     * {@inheritDoc}
     */
    public function get(array $input): array
    {
        return $this->dataProvider->get($input);
    }
}
