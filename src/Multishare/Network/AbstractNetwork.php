<?php

namespace Multishare\Network;

use OAuth\ServiceFactory;
use OAuth\Common\Service\AbstractService;
use OAuth\Common\Storage\TokenStorageInterface;
use OAuth\Common\Storage\Memory;
use OAuth\Common\Consumer\Credentials;
use OAuth\Common\Token\AbstractToken;

abstract class AbstractNetwork implements NetworkInterface
{
    protected $serviceFactory = null;
    protected $storage = null;
    protected $service = null;
    protected $config = null;
    protected $stdOAuthToken = null;

    public function __construct(array $config, TokenStorageInterface $storage = null)
    {
        $this->setConfig($config);
        $credentials = new Credentials(
            $config['key'],
            $config['secret'],
            $config['callbackUrl']
        );
        $credentials = $this->setCredentials($credentials);

        if (!$storage) $storage = new Memory();
        $this->setStorage($storage);

        $serviceFactory = new ServiceFactory();
        $this->setServiceFactory($serviceFactory);

        $service = $this->buildService();
        $this->setService($service);
    }

    public function setConfig(array $c)
    {
        $this->config = $c;
        return $this;
    }

    public function getConfig()
    {
        return $this->config;
    }

    public function setServiceFactory(ServiceFactory $s)
    {
        $this->serviceFactory = $s;
        return $this;
    }

    public function getServiceFactory()
    {
        return $this->serviceFactory;
    }

    public function setStorage(TokenStorageInterface $s)
    {
        $this->storage = $s;
        return $this;
    }

    public function getStorage()
    {
        return $this->storage;
    }

    public function setService(AbstractService $s)
    {
        $this->service = $s;
        return $this;
    }

    public function getService()
    {
        return $this->service;
    }

    public function setStdOAuthToken(AbstractToken $token)
    {
        $this->stdOAuthToken = $token;
        return $this;
    }

    public function getStdOAuthToken()
    {
        return $this->stdOAuthToken;
    }

    public function getCredentials()
    {
        return $this->credentials;
    }

    public function setCredentials(Credentials $credentials)
    {
        $this->credentials = $credentials;
        return $this;
    }
}
