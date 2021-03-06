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

namespace MehrAlsNix\kindergarten\Command\Analyze;

use MehrAlsNix\kindergarten\Callables\Executor;
use MehrAlsNix\kindergarten\Collector\Collector;
use MehrAlsNix\kindergarten\Command\Command;
use Psr\Log\LogLevel;
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
        $this->setName('analyze:run')
            ->setAliases(array('run'))
            ->setDescription(
                'Parses and transforms the given files to a specified location'
            )
            ->setHelp(
                <<<HELP

HELP
            )
            ->addArgument(
                'iterations',
                InputOption::VALUE_OPTIONAL,
                'The count of iterations the callable should walk.',
                [1000]
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
        $collector = new Collector();
        $files = $collector->execute();
        $counter = $input->getArgument('iterations')[0];

        foreach ($files as $file) {
            foreach ($file as $callable) {
                $output->write('', true);
                $output->write($callable['description'], true);
                $processor = new Executor();
                $processor->setIterations($counter);
                $processor->setCallable($callable['callable']);
                $output->writeTimedLog(
                    'Execute callable ' . $callable['name'],
                    [$processor, 'execute']
                );
            }
        }

        return 0;
    }
}
