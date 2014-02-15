<?php
namespace Multishare\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

use Multishare\Network\OAuth1\Twitter;

use Silex\Application;

class TwitterTextCommand extends Command {

    protected $app;

    public function __construct(Application $app, $name = null) {
        parent::__construct($name);
        $this->app = $app;
    }

    protected function configure() {
        $this->setName("multishare:twitter:text")
            ->setDescription("Share text in Twitter")
            ->setDefinition(array(
                new InputOption(
                    'text',
                    null,
                    InputOption::VALUE_REQUIRED,
                    'Text to share',
                    null
                )
            ))
            ->setHelp("The <info>test</info> command does things and stuff");
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $app = $this->app;
        $settings = $app['twitter'];

        $twitter = new Twitter($settings);

        $inputText = $input->getOption('text');

        $result = $twitter->shareText($inputText);

        if ($result)
            $output->writeln('<info>Text shared to Twitter</info>');
        else
            $output->writeln('<error>Error sharing text to Twitter</error>');

    }
}
