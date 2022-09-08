<?php

require_once __DIR__ . '/src/PhpCsFixer/Config.php';

return (new Marek\CodingStandard\PhpCsFixer\Config())
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->exclude(['vendor'])
            ->in(__DIR__)
    )
    ;
