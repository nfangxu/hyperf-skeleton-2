<?php
declare(strict_types=1);

namespace App\Exception\Handler;

use App\Exception\ExampleException;
use Hyperf\Contract\SessionInterface;
use Hyperf\Di\Annotation\Inject;
use Hyperf\ExceptionHandler\ExceptionHandler;
use Hyperf\HttpMessage\Stream\SwooleStream;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class WithSessionExceptionHandle extends ExceptionHandler
{
    /**
     * @Inject
     * @var SessionInterface
     */
    protected $session;

    public function handle(Throwable $throwable, ResponseInterface $response)
    {
        $this->session->set('test', 'set-in-handle');

        // $this->stopPropagation();

        return $response->withBody(new SwooleStream('session is missed.'));
    }

    public function isValid(Throwable $throwable): bool
    {
        return $throwable instanceof ExampleException;
    }
}
