<?php
namespace Multishare\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

use Multishare\Network\OAuth2\Vkontakte;

use Silex\Application;

class VkontakteTextCommand extends Command {

    protected $app;

    public function __construct(Application $app, $name = null) {
        parent::__construct($name);
        $this->app = $app;
    }

    protected function configure() {
        $this->setName("multishare:vkontakte:text")
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
        $settings = $app['vkontakte'];

        $vkontakte = new Vkontakte($settings);

        $inputText = $input->getOption('text');

        $result = $vkontakte->shareText($inputText);

        if ($result)
            $output->writeln('<info>Text shared to Vkontakte</info>');
        else
            $output->writeln('<error>Error sharing text to Vkontakte</error>');
    }
}
