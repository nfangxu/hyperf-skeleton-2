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

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Utils;
use Hyperf\Guzzle\ClientFactory;
use Hyperf\HttpMessage\Stream\SwooleStream;
use Hyperf\HttpServer\Contract\RequestInterface;

class IndexController extends AbstractController
{
    public function index(ClientFactory $factory, RequestInterface $request)
    {
        try {
            $response = $factory->create()->send($this->toRequest($request));
        } catch (RequestException $exception) {
            $response = $exception->hasResponse()
                ? $exception->getResponse()
                : [
                    'code' => -1,
                    'msg' => '请求异常',
                ];
        } catch (\Throwable $exception) {
            $response = [
                'code' => -1,
                'msg' => '系统错误',
            ];
        }

        if (! $response instanceof \Psr\Http\Message\RequestInterface) {
            return $response;
        }

        foreach ($response->getHeaders() as $header => $value) {
            if (! in_array($header, [
                'content-type',
                'content-disposition',
                'filename',
            ])) {
                $response = $response->withoutHeader($header);
            }
        }

        return $response->withStatus(200)->withBody(new SwooleStream($response->getBody()->getContents()));
    }

    private function toRequest(RequestInterface $request, $path = '')
    {
        $uri = $request->getUri()
            ->withScheme('https')
            ->withHost('www.baidu.com')
            ->withPort(443)
            ->withPath('/');

        foreach ($request->getHeaders() as $header => $value) {
            if (! in_array($header, [
                'content-type',
                'user-agent',
                'authorization',
                'accept',
            ])) {
                $request = $request->withoutHeader($header);
            }
        }

        return $request->withUri($uri)->withBody(Utils::streamFor($request->getBody()->getContents()));
    }
}
