<?php

namespace TestTaskDecorator\Src\Integration\Provider;

use TestTaskDecorator\Vendor\ClientSomeApi;

class DataProvider implements DataProviderInterface
{
    /**
     * @var object Client API object with interface of external API
     */
    protected $client;

    /**
     * DataProvider constructor.
     */
    public function __construct()
    {
        $host = null; // call config/database/some object etc
        $user = null; // call config/database/some object etc
        $password = null; // call config/database/some object etc

        $this->client = new ClientSomeApi($host, $user, $password);
    }

    /**
     * @param array $input
     *
     * @return array
     */
    public function get(array $input): array
    {
        return $this->fetch($input);
    }

    /**
     * @param array $input
     *
     * @return array
     */
    private function fetch(array $input): array
    {
        // Request to external REST API
    }
}
