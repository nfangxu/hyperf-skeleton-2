<?php
# Generated by the protocol buffer compiler (spiral/php-grpc). DO NOT EDIT!
# source: grpc/cti.proto

namespace Cti;

use Spiral\GRPC;

interface CtiInterface extends GRPC\ServiceInterface
{
    // GRPC specific service name.
    public const NAME = "cti.Cti";

    /**
    * @param GRPC\ContextInterface $ctx
    * @param AgentCmdRequest $in
    * @return AgentCmdReply
    *
    * @throws GRPC\Exception\InvokeException
    */
    public function AgentCmd(GRPC\ContextInterface $ctx, AgentCmdRequest $in): AgentCmdReply;
}
