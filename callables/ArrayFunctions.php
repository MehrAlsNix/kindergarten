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

return [
    [
        'name' => 'array merger #1',
        'description' => 'This is a array merging function using only the += operator.',
        'callable' => function($a = [0, 1, 2, 3, 4], $b = ['test', 'test2', 'test3']) {
            $c = array_merge($a, $b);
        }
    ],
    [
        'name' => 'array merger #2',
        'description' => 'This is a array merging function using the build in array_merge() function.',
        'callable' => function($a = [0, 1, 2, 3, 4], $b = ['test3', 'test2', 'test1']) {
            $c = $a + $b;
        }
    ],
    [
        'name' => 'array unique #1',
        'description' => 'This is a array unique build in function.',
        'callable' => function($a = [1, 1, 1, 2, 2, 3]) {
            $c = array_unique($a);
        }
    ],
    [
        'name' => 'array unique #2',
        'description' => 'This is a array unique with double array flip.',
        'callable' => function($a = [1, 1, 1, 2, 2, 3]) {
            $c =array_flip(array_flip($a));
        }
    ]
];
