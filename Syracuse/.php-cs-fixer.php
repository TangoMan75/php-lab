<?php

$finder = (new PhpCsFixer\Finder())
    ->in(__DIR__ . '/')
    ->in(__DIR__ . '/tests')
    ->exclude('vendor');

return (new PhpCsFixer\Config())
    ->setRules([
        '@PHPUnit75Migration:risky' => false,
        '@Symfony' => true,
        '@Symfony:risky' => false,
        'yoda_style' => false,
        'array_syntax' => ['syntax' => 'short'],
//        'binary_operator_spaces' => ['operators' => ['=>' => 'align']],
        'cast_spaces' => ['space' => 'single'],
        'declare_strict_types' => true,
        'fopen_flags' => false,
        'fully_qualified_strict_types' => true,
//        'native_function_invocation' => true,
        'no_superfluous_phpdoc_tags' => false,
        'ordered_imports' => true,
        'phpdoc_align' => ['align' => 'vertical'],
        'phpdoc_summary' => false,
        'phpdoc_to_comment' => false,
        'protected_to_private' => false,
        'header_comment' => [
            'header' => <<<EOF
This file is part of the TangoMan PHP Lab package.

(c) "Matthias Morin" <mat@tangoman.io>

For the full copyright and license information, please view the LICENSE
file that was distributed with this source code.
EOF
            ,
        ],
    ])
    ->setRiskyAllowed(false)
    ->setFinder($finder)
    ->setCacheFile('.php-cs-fixer.cache') // forward compatibility with 3.x line
    ;
