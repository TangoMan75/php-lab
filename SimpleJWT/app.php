<?php

declare(strict_types=1);

/*
 * This file is part of the TangoMan PHP Lab package.
 *
 * (c) "Matthias Morin" <mat@tangoman.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'vendor/autoload.php';

use TangoMan\SimpleJWT\Encoder\JwtEncoder;
use TangoMan\SimpleJWT\ValueObject\Payload;

$encoder = new JwtEncoder('secret');

$payload = ['foo' => 'bar'];

$token = $encoder->encode($payload);

var_dump($token);
var_dump($encoder->decode($token));
var_dump($encoder->isValid($token));

// --------------------------------------------------

$payload = new Payload([
    Payload::ISSUER => 'tangoman.io',
    'user' => [
        'firstname' => 'Matthias',
        'lastname' => 'Morin',
        'mail' => 'mat@tangoman.io',
    ],
]);

$token = $encoder->encode($payload->toArray());

var_dump($token);
var_dump($encoder->decode($token));
var_dump($encoder->isValid($token));
