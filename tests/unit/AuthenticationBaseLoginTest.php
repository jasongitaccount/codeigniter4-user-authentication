<?php

use Mockery as m;
use Citools\Auth\Models\LoginModel;
use CodeIgniter\Test\CIUnitTestCase;
use Citools\Auth\Authentication\AuthenticationBase;

class AuthenticationBaseLoginTest extends CIUnitTestCase
{
    /**
     * @var AuthenticationBase
     */
    protected $auth;

    /**
     * @var Mockery\MockInterface
     */
    protected $loginModel;

    public function setUp(): void
    {
        parent::setUp();

        $this->loginModel = m::mock(LoginModel::class);

        $this->auth = new AuthenticationBase(new \Citools\Auth\Config\Auth());
        $this->auth->setLoginModel($this->loginModel);
    }


    public function testRecordLoginAttemptSuccess()
    {
        $credentials = [
            'password' => 'secret',
            'email' => 'joe@example.com'
        ];

        $this->loginModel->shouldReceive('insert')->once()->with(M::subset([
            'ip_address' => '0.0.0.0',
            'email' => 'joe@example.com',
            'user_id' => 12,
            'date' => date('Y-m-d H:i:s'),
            'success' => 0
        ]))->andReturn(true);

        $this->assertTrue($this->auth->recordLoginAttempt($credentials['email'], '0.0.0.0', 12, false));
    }

}
