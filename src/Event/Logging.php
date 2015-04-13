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

namespace MehrAlsNix\kindergarten\Event;

use Psr\Log\LogLevel;

class Logging extends Debugging
{
    /**
     * Default priority level for these events is INFO
     * @var string $priority
     */
    protected $priority = LogLevel::INFO;

    /**
     * Set the priority level for this event.
     *
     * @param string $priority
     *
     * @see LogLevel for the constants used in determining the logging levels.
     *
     * @return Logging event
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }
}
