<?php
/**
 * This file is part of prooph/proophessor-do.
 * (c) 2014-2016 prooph software GmbH <contact@prooph.de>
 * (c) 2015-2016 Sascha-Oliver Prolic <saschaprolic@googlemail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Prooph\ProophessorDo\Container\Model\User;

use Interop\Container\ContainerInterface;
use Prooph\ProophessorDo\Infrastructure\Service\ChecksUniqueUsersEmailAddressFromReadModel;
use Prooph\ProophessorDo\Projection\User\UserFinder;

class ChecksUniqueUsersEmailAddressFactory
{
    public function __invoke(ContainerInterface $container): ChecksUniqueUsersEmailAddressFromReadModel
    {
        return new ChecksUniqueUsersEmailAddressFromReadModel(
            $container->get(UserFinder::class)
        );
    }
}
