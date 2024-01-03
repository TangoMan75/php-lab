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

namespace TangoMan\SimpleJWT\ValueObject;

/**
 * Payload Value Object
 */
class Payload
{
    public const ISSUER = 'iss'; // (Issuer) Claim
    public const SUBJECT = 'sub'; // (Subject) Claim
    public const AUDIENCE = 'aud'; // (Audience) Claim
    public const EXPIRATION_TIME = 'exp'; // (Expiration Time) Claim
    public const NOT_BEFORE = 'nbf'; // (Not Before) Claim
    public const ISSUED_AT = 'iat'; // (Issued At) Claim
    public const JWT_ID = 'jti'; // (JWT ID) Claim

    private const JWT_ID_LENGTH = 12;

    private array $claims;

    /**
     * @throws \Exception
     */
    public function __construct($claims = [])
    {
        $default = [
            self::JWT_ID => bin2hex(random_bytes(self::JWT_ID_LENGTH)),
            self::ISSUED_AT => time(),
        ];

        $this->claims = array_merge($default, $claims);
    }

    public function __toString(): string
    {
        return json_encode($this->claims);
    }

    public function toArray(): array
    {
        return $this->claims;
    }
}
