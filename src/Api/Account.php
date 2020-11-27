<?php

namespace Netinternet\Ilkbyte\Api;

class Account extends Base
{
    /**
     * Get your account info.
     *
     * @return array|mixed
     */
    public function info()
    {
        return $this->request('/account');
    }

    /**
     * Get your account's users.
     *
     * @return array|mixed
     */
    public function users()
    {
        return $this->request('/account/users');
    }
}
