<?php
declare(strict_types=1);

namespace App;

use Cti\AgentCmdReply;
use Cti\AgentCmdRequest;
use Hyperf\GrpcClient\BaseClient;

class CtiClient extends BaseClient
{
    public function fuck(string $data)
    {
        $arg = (new AgentCmdRequest())->setJsonRequest($data);

        list($reply, $status) = $this->_simpleRequest('/cti.Cti/AgentCmd', $arg, [AgentCmdReply::class, 'decode']);

        return $reply;
    }
}
