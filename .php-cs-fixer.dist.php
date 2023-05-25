<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__.'/src')
    ->in(__DIR__.'/tests')
;

// @See https://github.com/FriendsOfPHP/PHP-CS-Fixer
$config = new PhpCsFixer\Config();

return $config
    ->setRules([
        '@PHP82Migration' => true,
        '@Symfony' => true,
        '@Symfony:risky' => true,
        '@PHPUnit100Migration:risky' => true,
    ])
    ->setRiskyAllowed(true)
    ->setFinder($finder);
