<?php

namespace TestTaskDecorator\Src\Integration;

use Psr\Placeholder\CacheProvider;
use Psr\Placeholder\LogProvider;
use TestTaskDecorator\Src\Integration\Decorator\CacheDataProviderDecorator;
use TestTaskDecorator\Src\Integration\Decorator\LogDataProviderDecorator;
use TestTaskDecorator\Src\Integration\Provider\DataProvider;
use TestTaskDecorator\Src\Integration\Provider\DataProviderInterface;

class SomeApiService
{
    /**
     * @var DataProviderInterface
     */
    protected $dataProvider = null;

    /**
     * @param array $input
     *
     * @return array
     */
    public function getSomeData(array $input): array
    {
        $provider = $this->getDataProvider();
        $data = $provider->get($input);

        return $data;
    }

    /**
     * @return DataProviderInterface
     */
    public function getDataProvider(): DataProviderInterface
    {
        if ($this->dataProvider instanceof DataProviderInterface) {
            return $this->dataProvider;
        }

        $dataProvider = new DataProvider();
        $cacheProvider = new CacheProvider();
        $dataProvider = new CacheDataProviderDecorator($dataProvider);
        $dataProvider->setCacheProvider($cacheProvider);
        $logProvider = new LogProvider();
        $dataProvider = new LogDataProviderDecorator($dataProvider);
        $dataProvider->setLogProvider($logProvider);

        $this->dataProvider = $dataProvider;

        return $dataProvider;
    }
}
