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

namespace Prooph\ProophessorDo\Container\Infrastructure;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;
use Interop\Config\ConfigurationTrait;
use Interop\Config\RequiresConfigId;
use Interop\Config\RequiresMandatoryOptions;
use Interop\Container\ContainerInterface;

class DoctrineDbalConnectionFactory implements RequiresConfigId, RequiresMandatoryOptions
{
    use ConfigurationTrait;

    public function __invoke(ContainerInterface $container): Connection
    {
        $options = $this->options($container->get('config'), 'default');

        return DriverManager::getConnection($options);
    }

    public function dimensions(): array
    {
        return ['doctrine', 'connection'];
    }

    public function mandatoryOptions(): array
    {
        return ['driverClass'];
    }
}
