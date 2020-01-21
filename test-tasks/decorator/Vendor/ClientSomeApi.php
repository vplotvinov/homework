<?php

namespace TestTaskDecorator\Vendor;

class ClientSomeApi
{
    /**
     * @var string
     */
    private $host;
    /**
     * @var string
     */
    private $user;
    /**
     * @var string
     */
    private $password;

    /**
     * ClientSomeApi constructor.
     *
     * @param string $host
     * @param string $user
     * @param string $password
     */
    public function __construct(string $host, string $user, string $password)
    {
        $this->authorise(); // OR make query string with auth data before every call client
    }

    private function authorise()
    {
        // make authorise for some API if needed
    }
}
