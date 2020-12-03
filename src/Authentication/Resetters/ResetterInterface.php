<?php namespace Citools\Auth\Authentication\Resetters;

use CodeIgniter\Entity;

/**
 * Interface ResetterInterface
 *
 * @package Citools\Auth\Authentication\Resetters
 */
interface ResetterInterface
{
    /**
     * Send reset message to user
     *
     * @param User $user
     *
     * @return mixed
     */
    public function send(Entity $user = null): bool;

    /**
     * Returns the error string that should be displayed to the user.
     *
     * @return string
     */
    public function error(): string;

}
