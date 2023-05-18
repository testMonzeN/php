declare(strict_types=1);

namespace App\Domain\Service\Foo;

use App\Domain\Repository\FooInterface;
use App\Domain\Service\FooInterface as ServiceInterface;
use Phalcon\Di\Injectable;
use Phalcon\Http\ResponseInterface;

class Foo extends Injectable implements ServiceInterface
{
    public function __construct(private FooInterface $repository)
    {
    }

    /**
     * Delete a model instance
     */
    public function deleteModel(int $id): ResponseInterface
    {
        $model = $this->repository->findByPk($id);

        if ($this->delete($model)) {
            $this->flashSession->notice('Task completed');
            return $this->response->redirect(['for' => 'adminFoos']);
        }
    }
}