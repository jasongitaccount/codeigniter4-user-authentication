<?php namespace Citools\Auth\Config;

use CodeIgniter\Model;
use Citools\Auth\Authorization\FlatAuthorization;
use Citools\Auth\Models\UserModel;
use Citools\Auth\Models\LoginModel;
use Citools\Auth\Authorization\GroupModel;
use Citools\Auth\Authorization\PermissionModel;
use Citools\Auth\Authentication\Activators\ActivatorInterface;
use Citools\Auth\Authentication\Activators\UserActivator;
use Citools\Auth\Authentication\Passwords\PasswordValidator;
use Citools\Auth\Authentication\Resetters\EmailResetter;
use Citools\Auth\Authentication\Resetters\ResetterInterface;
use Config\Services as BaseService;

class Services extends BaseService
{
	public static function authentication(string $lib = 'local', Model $userModel = null, Model $loginModel = null, bool $getShared = true)
	{
		if ($getShared)
		{
			return self::getSharedInstance('authentication', $lib, $userModel, $loginModel);
		}

		$userModel  = $userModel ?? model(UserModel::class);
		$loginModel = $loginModel ?? model(LoginModel::class);

		/** @var \Citools\Auth\Config\Auth $config */
		$config   = config('Auth');
		$class	  = $config->authenticationLibs[$lib];
		$instance = new $class($config);

		return $instance
			->setUserModel($userModel)
			->setLoginModel($loginModel);
	}

	public static function authorization(Model $groupModel = null, Model $permissionModel = null, Model $userModel = null, bool $getShared = true)
	{
		if ($getShared)
		{
			return self::getSharedInstance('authorization', $groupModel, $permissionModel, $userModel);
		}

		$groupModel	     = $groupModel ?? model(GroupModel::class);
		$permissionModel = $permissionModel ?? model(PermissionModel::class);
		$userModel	     = $userModel ?? model(UserModel::class);

		$instance = new FlatAuthorization($groupModel, $permissionModel);

		return $instance->setUserModel($userModel);
	}

	/**
	 * Returns an instance of the PasswordValidator.
	 *
	 * @param Auth|null $config
	 * @param bool      $getShared
	 *
	 * @return ValidatorInterface
	 */
	public static function passwords(Auth $config = null, bool $getShared = true): PasswordValidator
	{
		if ($getShared)
		{
			return self::getSharedInstance('passwords', $config);
		}

		return new PasswordValidator($config ?? config(Auth::class));
	}

	/**
	 * Returns an instance of the Activator.
	 *
	 * @param Auth|null $config
	 * @param bool      $getShared
	 *
	 * @return ActivatorInterface
	 */
	public static function activator(Auth $config = null, bool $getShared = true): ActivatorInterface
	{
		if ($getShared)
		{
			return self::getSharedInstance('activator', $config);
		}

		$config = $config ?? config(Auth::class);
		$class	= $config->requireActivation ?: UserActivator::class;

		return new $class($config);
	}

	/**
	 * Returns an instance of the Resetter.
	 *
	 * @param Auth|null $config
	 * @param bool      $getShared
	 *
	 * @return ResetterInterface
	 */
	public static function resetter(Auth $config = null, bool $getShared = true): ResetterInterface
	{
		if ($getShared)
		{
			return self::getSharedInstance('resetter', $config);
		}

		$config = $config ?? config(Auth::class);
		$class	= $config->activeResetter ?: EmailResetter::class;

		return new $class($config);
	}
}
