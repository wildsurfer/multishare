<?php

namespace Multishare\Network\OAuth2;

use Multishare\Network\AbstractNetwork as BaseAbstractNetwork;
use OAuth\OAuth2\Token\StdOAuth2Token;
use OAuth\Common\Storage\TokenStorageInterface;

abstract class AbstractNetwork extends BaseAbstractNetwork
{
    public function __construct(array $config, TokenStorageInterface $storage = null)
    {
        $this->setStdOAuthToken (new StdOAuth2Token());
        parent::__construct($config, $storage);
    }
}
