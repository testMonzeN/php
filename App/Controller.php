namespace App\Module\Admin\Foo;

use Phalcon\Mvc\Controller;

class Foo extends Controller
{
    private FooInterface $service;

    /**
     * Inject service layer dependencies
     */
    public function onConstruct(): void
    {
        $this->service = $this->getDI()->get('fooService');
    }
}