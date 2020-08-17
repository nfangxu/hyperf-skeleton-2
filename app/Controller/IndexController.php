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

use App\Model\User;
use Fx\HyperfHttpAuth\Contract\HttpAuthContract;
use Hyperf\Di\Annotation\Inject;

class IndexController extends AbstractController
{
    /**
     * @Inject()
     * @var HttpAuthContract
     */
    protected $auth;

    public function index()
    {
        return $this->data();
    }

    /**
     * 登录
     */
    public function login()
    {
        /** 方式 1 */
        // 等价于 auth()->login(User::first());
        $this->auth->login(User::first());

        /** 方式 2 */
        // 等价于 auth()->attempt(['email' => 'xxx', 'password' => '123456']);
        $this->auth->attempt(['email' => 'xxx', 'password' => '123456']);

        return $this->data();
    }

    /**
     * 登出
     */
    public function logout()
    {
        // 等价于 auth()->logout();
        $this->auth->logout();
        return $this->data();
    }

    protected function data()
    {
        return [
            'user' => auth()->user(),
            'is_login' => auth()->check(),
        ];
    }
}
