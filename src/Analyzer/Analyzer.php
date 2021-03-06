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

namespace MehrAlsNix\kindergarten\Analyzer;

use MehrAlsNix\kindergarten\Component\Component;
use MehrAlsNix\kindergarten\Event\Debugging;
use MehrAlsNix\kindergarten\Event\Dispatcher;
use Psr\Log\LogLevel;
use MehrAlsNix\kindergarten\Event\Logging;

final class Analyzer implements Component
{
    public function __construct()
    {

    }

    public function execute()
    {

    }

    /**
     * @param string $message
     * @param string $level
     */
    public function log($message, $level = LogLevel::INFO)
    {
        Dispatcher::getInstance()->dispatch(
            'system.log',
            Logging::createInstance($this)
                ->setMessage($message)
                ->setPriority($level)
        );
    }

    /**
     * @param string $message The message to log.
     */
    public function debug($message)
    {
        Dispatcher::getInstance()->dispatch(
            'system.debug',
            Debugging::createInstance($this)
                ->setMessage($message)
        );
    }
}
