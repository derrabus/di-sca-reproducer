<?php

declare(strict_types=1);

namespace App\Command;

use Psr\Container\ContainerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Contracts\Service\ServiceSubscriberInterface;

final class TestCommand extends Command implements ServiceSubscriberInterface
{
    protected static $defaultName = 'test';

    public function __construct(
        private ContainerInterface $container,
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln(get_class($this->container->get('a')->getDependency('b')));

        return self::SUCCESS;
    }

    public static function getSubscribedServices(): array
    {
        return ['a'];
    }
}
