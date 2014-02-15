<?php

namespace Multishare\Network\OAuth2;

class Vkontakte extends AbstractNetwork
{
    public function buildService()
    {
        $serviceFactory = $this->getServiceFactory();
        $credentials = $this->getCredentials();
        $storage = $this->getStorage();
        $token = $this->getStdOAuthToken();
        $config = $this->getConfig();

        $token->setAccessToken($config['accessToken']);

        $storage->storeAccessToken('Vkontakte', $token);

        return $serviceFactory->createService('vkontakte', $credentials, $storage);
    }

    public function shareText($inputText)
    {
        $service = $this->getService();
        $postFields = array(
            'message' => $inputText
        );

        $result = json_decode($service->request(
            'wall.post',
            'POST',
            $postFields
        ));

        if ($result) return true;
        else return false;
    }
}
