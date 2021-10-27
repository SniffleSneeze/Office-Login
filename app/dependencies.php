<?php
declare(strict_types=1);

use DI\ContainerBuilder;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Slim\Views\PhpRenderer;

return function (ContainerBuilder $containerBuilder) {
    $container = [];

    $container[LoggerInterface::class] = function (ContainerInterface $c) {
        $settings = $c->get('settings');

        $loggerSettings = $settings['logger'];
        $logger = new Logger($loggerSettings['name']);

        $processor = new UidProcessor();
        $logger->pushProcessor($processor);

        $handler = new StreamHandler($loggerSettings['path'], $loggerSettings['level']);
        $logger->pushHandler($handler);

        return $logger;
    };

    $container['renderer'] = function (ContainerInterface $c) {
        $settings = $c->get('settings')['renderer'];
        $renderer = new PhpRenderer($settings['template_path']);
        return $renderer;
    };

    $container['db'] = function (ContainerInterface $c) {
        $settings = $c->get('settings')['db'];
        $db = new PDO($settings['host'] . $settings['dbName'], $settings['userName'], $settings['password']);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // uncomment to debug DB errors
        return $db;
    };


    $container['HomePageController'] =
        DI\factory(\App\Factories\Controllers\HomePageControllerFactory::class);
    $container['AddVisitorController'] =
        DI\factory(\App\Factories\Controllers\AddVisitorControllerFactory::class);
    $container['AdminPageController'] =
        DI\factory(\App\Factories\Controllers\AdminPageControllerFactory::class);
    $container['VisitorModel'] =
        DI\factory(\App\Factories\Models\VisitorModelFactory::class);
    $container['AdminModel'] =
        DI\factory(\App\Factories\Models\AdminModelFactory::class);
    $container['AddVisitorFormController'] =
        DI\factory(\App\Factories\Controllers\AddVisitorFormControllerFactory::class);
    $container['SignOutController'] =
        DI\factory(\App\Factories\Controllers\SignOutControllerFactory::class);
    $container['SignOutSearchController'] =
        DI\factory(\App\Factories\Controllers\SignOutSearchControllerFactory::class);
    $container['AdminPasscodeController'] =
        DI\factory(\App\Factories\Controllers\AdminPasscodeControllerFactory::class);
    $container['SignOutVisitorController'] =
        DI\factory(\App\Factories\Controllers\SignOutVisitorControllerFactory::class);
    $container['SignOutVisitorByAdminController'] =
        DI\factory(\App\Factories\Controllers\SignOutVisitorByAdminControllerFactory::class);
    $container['SignOutAllVisitorsByAdminController'] =
        DI\factory(\App\Factories\Controllers\SignOutAllVisitorsByAdminControllerFactory::class);
    $container['LogoutController'] = (new \App\Controllers\LogoutController());

    $containerBuilder->addDefinitions($container);
};
