<?php

use CodeIgniter\Test\CIUnitTestCase;
use Citools\Auth\Authentication\Passwords\DictionaryValidator;

class DictionaryValidatorTest extends CIUnitTestCase
{
    /**
     * @var CompositionValidator
     */
    protected $validator;

    public function setUp(): void
    {
        parent::setUp();

        $config = new \Citools\Auth\Config\Auth();

        $this->validator = new DictionaryValidator();
        $this->validator->setConfig($config);
    }

    public function testCheckFalseOnFoundPassword()
    {
        $password = '!!!gerard!!!';

        $this->assertFalse($this->validator->check($password));
    }

    public function testCheckTrueOnNotFound()
    {
        $password = '!!!gerard!!!abootylicious';

        $this->assertTrue($this->validator->check($password));
    }

}
