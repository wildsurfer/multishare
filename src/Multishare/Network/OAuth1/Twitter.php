<?php

namespace Multishare\Network\OAuth1;

class Twitter extends AbstractNetwork
{
    public function buildService()
    {
        $serviceFactory = $this->getServiceFactory();
        $credentials = $this->getCredentials();
        $storage = $this->getStorage();
        $token = $this->getStdOAuthToken();
        $config = $this->getConfig();

        $token->setAccessToken($config['accessToken']);
        $token->setAccessTokenSecret($config['accessTokenSecret']);

        $storage->storeAccessToken('Twitter', $token);

        return $serviceFactory->createService('twitter', $credentials, $storage);
    }

    public function shareText($inputText)
    {
        $service = $this->getService();
        $postFields = array(
            'status' => $inputText
        );

        $result = json_decode($service->request(
            'statuses/update.json',
            'POST',
            $postFields
        ));

        if ($result) return true;
        else return false;
    }
}
