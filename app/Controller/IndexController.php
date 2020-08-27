<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace App\Controller;

use App\Exception\ExampleException;
use Hyperf\Contract\SessionInterface;
use Hyperf\Di\Annotation\Inject;

class IndexController extends AbstractController
{
    /**
     * @Inject
     * @var SessionInterface
     */
    protected $session;

    public function index()
    {
        return $this->session->all();
    }

    public function setSession()
    {
        $this->session->put('test', 'fangx');
    }

    public function setSessionWithException()
    {
        throw new ExampleException('exception is toggled.');
    }
}
