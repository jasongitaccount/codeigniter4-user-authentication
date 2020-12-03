<?php

use CodeIgniter\Test\Fabricator;
use Citools\Auth\Entities\User;
use Citools\Auth\Test\Fakers\GroupFaker;
use Citools\Auth\Test\Fakers\UserFaker;
use Tests\Support\AuthTestCase;

class FakersTest extends AuthTestCase
{
    public function testUserFakerReturnsUser()
    {
		$fabricator = new Fabricator(UserFaker::class);
		$user       = $fabricator->make();

		$this->assertInstanceOf(User::class, $user);
    }

    public function testUserFakerCreatesUser()
    {
		$fabricator = new Fabricator(UserFaker::class);
		$user       = $fabricator->create();

		$this->seeInDatabase('users', ['email' => $user->email]);
    }

    public function testGroupFakerReturnsObject()
    {
		$fabricator = new Fabricator(GroupFaker::class);
		$group      = $fabricator->make();

		$this->assertIsObject($group);
    }

    public function testGroupFakerCreatesGroup()
    {
		$fabricator = new Fabricator(GroupFaker::class);
		$group      = $fabricator->create();

		$this->seeInDatabase('auth_groups', ['name' => $group->name]);
    }
}
