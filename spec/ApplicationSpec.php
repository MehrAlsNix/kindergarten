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

namespace spec\MehrAlsNix\kindergarten;

use Monolog\Logger;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ApplicationSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('MehrAlsNix\kindergarten\Application');
    }

    function it_should_be_a_cilex_application()
    {
        $this->shouldBeAnInstanceOf('Cilex\Application');
    }

    function it_is_runnable()
    {
        $this->run();
    }

    function it_should_be_able_to_configure_a_logger(Logger $logger)
    {
        $this->configureLogger($logger, 'quiet')->shouldReturn(null);
    }
}
