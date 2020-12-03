<?php namespace Citools\Auth\Test\Fakers;

use Faker\Generator;
use Citools\Auth\Authorization\PermissionModel;

class PermissionFaker extends PermissionModel
{
	/**
	 * Faked data for Fabricator.
	 *
	 * @param Generator $faker
	 *
	 * @return array
	 */
	public function fake(Generator &$faker): array
	{
		return [
            'name'        => $faker->word,
            'description' => $faker->sentence,
		];
	}
}
