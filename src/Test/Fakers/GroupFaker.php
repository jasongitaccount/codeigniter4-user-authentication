<?php namespace Citools\Auth\Test\Fakers;

use Faker\Generator;
use Citools\Auth\Authorization\GroupModel;

class GroupFaker extends GroupModel
{
	/**
	 * Faked data for Fabricator.
	 *
	 * @param Generator $faker
	 *
	 * @return object
	 */
	public function fake(Generator &$faker): \stdClass
	{
		return (object) [
            'name'        => $faker->word,
            'description' => $faker->sentence,
		];
	}
}
