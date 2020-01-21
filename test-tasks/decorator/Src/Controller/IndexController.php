<?php

namespace TestTaskDecorator\Controller;

use TestTaskDecorator\Src\Integration\SomeApiService;

class IndexController
{
    /**
     * @param array $arguments
     *
     * @return array
     */
    public function getSomeData(array $arguments): array
    {
        $someApiService = new SomeApiService();
        $input = $arguments; // prepare input base on arguments

        return $someApiService->getSomeData($input);
    }
}

