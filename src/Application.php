<?php
/**
 * kindergarten
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 *
 * @copyright 2015 MehrAlsNix (http://www.mehralsnix.de)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @link      http://github.com/MehrAlsNix/kindergarten
 */

namespace MehrAlsNix\kindergarten;

use Cilex\Application as Cilex;
use Cilex\Provider\MonologServiceProvider;
use Monolog\ErrorHandler;
use Monolog\Handler\NullHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Psr\Log\LogLevel;
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

    private $logLevelMap = [
        'emergency' => Logger::EMERGENCY,
        'emerg'     => Logger::EMERGENCY,
        'alert'     => Logger::ALERT,
        'crit'      => Logger::CRITICAL,
        'critical'  => Logger::CRITICAL,
        'err'       => Logger::ERROR,
        'error'     => Logger::ERROR,
        'warning'   => Logger::WARNING,
        'warn'      => Logger::WARNING,
        'notice'    => Logger::NOTICE,
        'info'      => Logger::INFO,
        'debug'     => Logger::DEBUG
    ];

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
                $level = 'error'; //(string)$app['config']->logging->level;

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

        $this['monolog.level'] = isset($this->logLevelMap[$level]) ? $this->logLevelMap[$level] : 'quiet';
        if ($logPath !== null) {
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
