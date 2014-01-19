<?php
namespace Multishare\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

use Silex\Application;

class TwitterCommand extends Command {

    protected $app;

    public function __construct(Application $app, $name = null) {
        parent::__construct($name);
        $this->app = $app;
    }

    protected function configure() {
        $this->setName("multishare:twitter:url")
            ->setDescription("Share url in Twitter")
            ->setDefinition(array(
            ))
            ->setHelp("The <info>test</info> command does things and stuff");
    }

    protected function execute(InputInterface $input, OutputInterface $output) {

        $app = $this->app;
        $settings = $app['twitter']['settings'];
        $url = $app['twitter']['url'].'statuses/update.json';

        $requestMethod = 'POST';

        $twitter = new \TwitterAPIExchange($settings);

        $postFields = array(
            'status' => 'Test status '.time()
        );

        echo $twitter->buildOauth($url, $requestMethod)
            ->setPostfields($postFields)
            ->performRequest();
    }
}
