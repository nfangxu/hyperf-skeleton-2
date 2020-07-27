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

use App\CtiClient;
use Cti\AgentCmdReply;

class IndexController extends AbstractController
{
    public function index()
    {
        /** @var AgentCmdReply $res */
        $res = (new CtiClient('127.0.0.1:9503', ['credentials' => null]))->fuck('{"action":15,"fuck":"6690170531783684096"}');

        var_dump($res);

        return $res->serializeToJsonString();
    }

    public function cmd()
    {
        return new AgentCmdReply;
    }
}
