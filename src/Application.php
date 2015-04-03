<?php

namespace MehrAlsNix\kindergarten;

use Cilex\Application as Cilex;
use Cilex\Provider\MonologServiceProvider;
use Monolog\ErrorHandler;
use Monolog\Handler\NullHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Shell;
use Symfony\Component\Console\Application as ConsoleApplication;
use Symfony\Component\Stopwatch\Stopwatch;

/**
 * Class Application
 *
 * @package MehrAlsNix\kindergarten
 */
class Application extends Cilex
{
    public static $VERSION = '0.0.0';

    public function __construct()
    {
        parent::__construct('kindergarten', self::$VERSION);

        $this['kernel.timer.start'] = time();
        $this['kernel.stopwatch'] = function() {
            return new Stopwatch();
        };

        $this->addLogging();

        $this->command(new Command\Analyze\RunCommand());
        $this->command(new Command\Compare\RunCommand());
    }

    /**
     * Run the application and if no command is provided, use project:run.
     *
     * @param bool $interactive Whether to run in interactive mode.
     *
     * @return void
     */
    public function run($interactive = false)
    {
        /** @var ConsoleApplication $app */
        $app = $this['console'];
        $app->setAutoExit(false);
        if ($interactive) {
            $app = new Shell($app);
        }
        $output = new Console\Output\Output();
        $output->setLogger($this['monolog']);
        $app->run(new ArgvInput(), $output);
    }

    /**
     * Adds a logging provider to the container.
     *
     * @return void
     */
    protected function addLogging()
    {
        $this->register(
            new MonologServiceProvider(),
            array(
                'monolog.name' => 'kindergarten',
                'monolog.logfile' => sys_get_temp_dir() . '/kindergarten.log',
                'monolog.debugfile' => sys_get_temp_dir() . '/kindergarten.debug.log',
                'monolog.level' => Logger::INFO
            )
        );
        $app = $this;
        $this['monolog.configure'] = self::protect(
            function($log) use ($app) {
                $level = 'error';//(string)$app['config']->logging->level;

                $logPath = null;
                    /*
                    isset($app['config']->logging->paths->default)
                    ? (string)$app['config']->logging->paths->default
                    : null;
*/
                $debugPath = null;
                    /*
                    isset($app['config']->logging->paths->errors)
                    ? (string)$app['config']->logging->paths->errors
                    : null;
                    */
                $app->configureLogger($log, $level, $logPath, $debugPath);
            }
        );
        ErrorHandler::register($this['monolog']);
    }

    /**
     * @param Logger      $logger
     * @param string      $level
     * @param string|null $logPath optional
     */
    public function configureLogger(Logger $logger, $level, $logPath = null)
    {
        $monolog = $logger;
        switch ($level) {
            case 'emergency':
            case 'emerg':
                $level = Logger::EMERGENCY;
                break;
            case 'alert':
                $level = Logger::ALERT;
                break;
            case 'critical':
            case 'crit':
                $level = Logger::CRITICAL;
                break;
            case 'error':
            case 'err':
                $level = Logger::ERROR;
                break;
            case 'warning':
            case 'warn':
                $level = Logger::WARNING;
                break;
            case 'notice':
                $level = Logger::NOTICE;
                break;
            case 'info':
                $level = Logger::INFO;
                break;
            case 'debug':
                $level = Logger::DEBUG;
                break;
        }
        $this['monolog.level'] = $level;
        if ($logPath) {
            $logPath = str_replace(
                array('{APP_ROOT}', '{DATE}'),
                array(realpath(__DIR__ . '/..'), $this['kernel.timer.start']),
                $logPath
            );
            $this['monolog.logfile'] = $logPath;
        }

        try {
            while ($monolog->popHandler()) {
            }
        } catch (\LogicException $e) {
            // popHandler throws an exception when you try to pop the empty stack; to us this is not an
            // error but an indication that the handler stack is empty.
        }

        if ($level === 'quiet') {
            $monolog->pushHandler(new NullHandler());
            return;
        }

        if ($logPath !== null) {
            $monolog->pushHandler(new StreamHandler($logPath, $level));
        } else {
            $monolog->pushHandler(new StreamHandler('php://stdout', $level));
        }
    }
}
