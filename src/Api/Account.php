<?php

namespace Netinternet\Ilkbyte\Api;

class Account extends Base
{
    public function account()
    {
        return $this->request('/account');
    }
}
