<?php

namespace MehrAlsNix\kindergarten\Command\Compare;

use MehrAlsNix\kindergarten\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class RunCommand extends Command
{
    /**
     * Initializes this command and sets the name, description, options and
     * arguments.
     *
     * @return void
     */
    protected function configure()
    {
        $this->setName('compare:run')
            ->setAliases(array('comp'))
            ->setDescription(
                'Compares a callable against a list of others for measuring performance and memory consumption'
            )
            ->setHelp(
                <<<HELP
            HELP TEXT
HELP
            )
            ->addOption(
                'base',
                'b',
                InputOption::VALUE_REQUIRED,
                'Base callable to compare against'
            )
            ->addOption(
                'targets',
                't',
                InputOption::VALUE_REQUIRED | InputOption::VALUE_IS_ARRAY,
                'Comma-separated list of callables to compare against base'
            );
        parent::configure();
    }

    /**
     * Executes the business logic involved with this command.
     *
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /*
        $parse_command = $this->getApplication()->find('project:parse');
        $transform_command = $this->getApplication()->find('project:transform');
        $parse_input = new ArrayInput(
            array(
                'command' => 'project:parse',
                '--filename' => $input->getOption('filename'),
                '--directory' => $input->getOption('directory'),
                '--encoding' => $input->getOption('encoding'),
                '--extensions' => $input->getOption('extensions'),
                '--ignore' => $input->getOption('ignore'),
                '--ignore-tags' => $input->getOption('ignore-tags'),
                '--hidden' => $input->getOption('hidden'),
                '--ignore-symlinks' => $input->getOption('ignore-symlinks'),
                '--markers' => $input->getOption('markers'),
                '--title' => $input->getOption('title'),
                '--target' => $input->getOption('cache-folder') ?: $input->getOption('target'),
                '--force' => $input->getOption('force'),
                '--validate' => $input->getOption('validate'),
                '--visibility' => $input->getOption('visibility'),
                '--defaultpackagename' => $input->getOption('defaultpackagename'),
                '--sourcecode' => $input->getOption('sourcecode'),
                '--parseprivate' => $input->getOption('parseprivate'),
                '--progressbar' => $input->getOption('progressbar'),
                '--log' => $input->getOption('log')
            ),
            $this->getDefinition()
        );
        $return_code = $parse_command->run($parse_input, $output);
        if ($return_code !== 0) {
            return $return_code;
        }
        $transform_input = new ArrayInput(
            array(
                'command' => 'project:transform',
                '--source' => $input->getOption('cache-folder') ?: $input->getOption('target'),
                '--target' => $input->getOption('target'),
                '--template' => $input->getOption('template'),
                '--progressbar' => $input->getOption('progressbar'),
                '--log' => $input->getOption('log')
            )
        );
        $return_code = $transform_command->run($transform_input, $output);
        if ($return_code !== 0) {
            return $return_code;
        }
        if ($output->getVerbosity() === OutputInterface::VERBOSITY_DEBUG) {
            $descriptorBuilder = $this->getService('descriptor.builder');
            file_put_contents('ast.dump', serialize($descriptorBuilder->getProjectDescriptor()));
        }
        */
        return 0;
    }
}
