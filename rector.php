<?php

declare(strict_types=1);
use Rector\Php80\Rector\Class_\AnnotationToAttributeRector;
use Rector\PHPUnit\Rector\Class_\AnnotationWithValueToAttributeRector;

use Rector\Config\RectorConfig;
use Rector\Core\ValueObject\PhpVersion;
use Rector\Doctrine\Set\DoctrineSetList;
use Rector\PHPUnit\Set\PHPUnitLevelSetList;
use Rector\PHPUnit\Set\PHPUnitSetList;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;
use Rector\Symfony\Set\SymfonyLevelSetList;
use Rector\Symfony\Set\SymfonySetList;

return static function (RectorConfig $config): void {
    $config->import(SetList::DEAD_CODE);
    $config->import(LevelSetList::UP_TO_PHP_81);
    $config->import(SymfonyLevelSetList::UP_TO_SYMFONY_54);
    $config->import(SymfonySetList::SYMFONY_CODE_QUALITY);
    $config->import(SymfonySetList::SYMFONY_52_VALIDATOR_ATTRIBUTES);
    $config->import(SymfonySetList::SYMFONY_CONSTRUCTOR_INJECTION);
    $config->import(SymfonySetList::ANNOTATIONS_TO_ATTRIBUTES);
    $config->import(DoctrineSetList::DOCTRINE_CODE_QUALITY);
    $config->import(DoctrineSetList::ANNOTATIONS_TO_ATTRIBUTES);
    $config->import(PHPUnitSetList::PHPUNIT_SPECIFIC_METHOD);
    $config->import(PHPUnitLevelSetList::UP_TO_PHPUNIT_90);
    $config->import(PHPUnitSetList::PHPUNIT_CODE_QUALITY);
    $config->import(PHPUnitSetList::PHPUNIT_EXCEPTION);
    $config->import(PHPUnitSetList::PHPUNIT_YIELD_DATA_PROVIDER);
    $config->import(PHPUnitSetList::REMOVE_MOCKS);
    $config->paths([
        __DIR__ . '/ecs.php',
        __DIR__ . '/rector.php',
        __DIR__ . '/monorepo-builder.php',
        __DIR__ . '/performance',
        __DIR__ . '/src',
        __DIR__ . '/tests',
    ]);
    $config->skip([
        AnnotationToAttributeRector::class => __DIR__ . '/tests',
        AnnotationWithValueToAttributeRector::class => __DIR__ . '/tests',
        __DIR__ . '/src/Component/Core/JWKSet.php',
        __DIR__ . '/src/Bundle/JoseFramework/DependencyInjection/Source/KeyManagement/JWKSource.php',
        __DIR__ . '/src/Bundle/JoseFramework/DependencyInjection/Source/KeyManagement/JWKSetSource.php',
    ]);
    $config->phpVersion(PhpVersion::PHP_81);
    $config->parallel();
    $config->importNames();
    $config->importShortClasses();
};
