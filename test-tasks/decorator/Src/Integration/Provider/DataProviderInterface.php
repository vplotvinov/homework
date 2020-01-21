<?php

namespace TestTaskDecorator\Src\Integration\Provider;

interface DataProviderInterface
{
    /**
     * @param array $input
     *
     * @return array
     */
    public function get(array $input): array;
}
