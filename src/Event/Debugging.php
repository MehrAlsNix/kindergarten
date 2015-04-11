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

class Debugging extends BaseEvent
{
    /** @var string Message to display with the debugging event */
    protected $message;
    /** @var int Default priority level for these events is DEBUG */
    protected $priority = LogLevel::DEBUG;
    /** @var string[] Extra parameters to insert into the message after translation */
    protected $context = array();
    /**
     * Provides the message that is to be shown with this event.
     *
     * @param string $message
     *
     * @return Debugging
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }
    /**
     * Returns the message that was provided with this event.
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }
    /**
     * Returns the priority level associated with this logging event.
     *
     * @return int
     */
    public function getPriority()
    {
        return $this->priority;
    }
    /**
     * Sets additional context (parameters) to use when translating messages.
     *
     * @param string[] $context
     *
     * @return self
     */
    public function setContext(array $context)
    {
        $this->context = $context;
        return $this;
    }
    /**
     * Returns the context for this event.
     *
     * @return string[]
     */
    public function getContext()
    {
        return $this->context;
    }
}
