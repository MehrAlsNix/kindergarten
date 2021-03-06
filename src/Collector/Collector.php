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

namespace MehrAlsNix\kindergarten\Collector;

use MehrAlsNix\kindergarten\Callables\Adapter\Phparray;
use MehrAlsNix\kindergarten\Component\Component;
use Symfony\Component\Finder\Finder;

final class Collector implements Component
{
    /** @var string $type */
    private $type = 'phparray';

    /** @var array $callables */
    private $callables;

    /** @var Finder $finder */
    private $finder;
    /**
     * @param string $path
     */
    public function __construct($path = null)
    {
        $path = $path !== null ? (string) $path : __DIR__ . '/../../callables/';
        $this->finder = (new Finder())->in($path);
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function execute()
    {
        $callableType = new Phparray();
        $callables = $callableType->convert($this->finder);

        return $callables;
    }
}
