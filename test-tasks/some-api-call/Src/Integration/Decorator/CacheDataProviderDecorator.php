<?php

namespace TestTaskDecorator\Src\Integration\Decorator;

use DateTime;
use Psr\Cache\CacheItemPoolInterface;
use Psr\Cache\InvalidArgumentException;

class CacheDataProviderDecorator extends AbstractDataProviderDecorator
{
    /**
     * @var CacheItemPoolInterface
     */
    private $cacheProvider;

    /**
     * @param CacheItemPoolInterface $cacheProvider
     */
    public function setCacheProvider(CacheItemPoolInterface $cacheProvider): void
    {
        $this->cacheProvider = $cacheProvider;
    }

    /**
     * {@inheritdoc}
     * @throws InvalidArgumentException
     */
    public function get(array $input): array
    {
        $cacheKey = $this->getCacheKey($input);
        $cacheItem = $this->cacheProvider->getItem($cacheKey);
        if ($cacheItem->isHit()) {
            return $cacheItem->get();
        }

        $result = parent::get($input);

        $cacheItem
            ->set($result)
            ->expiresAt(
                (new DateTime())->modify('+1 day')
            );

        return $result;
    }

    /**
     * @param array $input
     *
     * @return string
     */
    private function getCacheKey(array $input): string
    {
        return md5(serialize($input));
    }
}


