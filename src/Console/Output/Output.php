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

namespace MehrAlsNix\kindergarten\Console\Output;

use Monolog\Logger;
use Symfony\Component\Console\Output\ConsoleOutput;

class Output extends ConsoleOutput
{
    /** @var Logger */
    protected $logger;

    /**
     * Sets a logger object to write information to.
     *
     * @param Logger $logger
     */
    public function setLogger(Logger $logger)
    {
        $this->logger = $logger;
    }
    /**
     * Returns the object where is being logged to.
     *
     * @return Logger
     */
    public function getLogger()
    {
        return $this->logger;
    }
    /**
     * Executes a callable piece of code and writes an entry to the log detailing how long it took.
     *
     * @param string $message
     * @param callable $operation
     * @param array $arguments
     *
     * @return void
     */
    public function writeTimedLog($message, $operation, array $arguments = array())
    {
        $this->write(sprintf('%-66.66s .. ', $message));
        $timerStart = microtime(true);
        call_user_func_array($operation, $arguments);
        $this->writeln(sprintf('%1.7fs', microtime(true) - $timerStart));
    }
    /**
     * Write an entry to the console and to the provided logger.
     *
     * @param array|string $message
     * @param bool $newline
     * @param int $type
     *
     * @return void
     */
    public function write($message, $newline = false, $type = 0)
    {
        if ($this->getLogger()) {
            $this->getLogger()->info($this->getFormatter()->format(strip_tags($message)));
        }
        parent::write($message, $newline, $type);
    }
}
