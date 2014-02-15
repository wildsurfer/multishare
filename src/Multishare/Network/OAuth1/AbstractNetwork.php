<?php

namespace Multishare\Network\OAuth1;

use Multishare\Network\AbstractNetwork as BaseAbstractNetwork;
use OAuth\OAuth1\Token\StdOAuth1Token;
use OAuth\Common\Storage\TokenStorageInterface;

abstract class AbstractNetwork extends BaseAbstractNetwork
{
    public function __construct(array $config, TokenStorageInterface $storage = null)
    {
        $this->setStdOAuthToken (new StdOAuth1Token());
        parent::__construct($config, $storage);
    }
}
