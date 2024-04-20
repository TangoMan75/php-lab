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

namespace TangoMan\SimpleJWT\Encoder;

/**
 * Simple JWT Implementation
 *
 * https://www.rfc-editor.org/rfc/rfc7519
 */
class JwtEncoder
{
    public const HEADER = 'header';
    public const CLAIMS = 'claims';
    public const SIGNATURE = 'signature';

    public const ALGORITHM = 'alg'; // (Algorithm) Header Parameter
    public const TYPE = 'typ';      // (Type) Header Parameter

    public const HS256 = 'HS256';
    public const HS384 = 'HS384';
    public const HS512 = 'HS512';

    public const VALID_ALGOS = [
        self::HS256 => 'sha256',
        self::HS384 => 'sha384',
        self::HS512 => 'sha512',
    ];

    private const DEFAULT_HEADER = [
        self::ALGORITHM => self::HS256,
        self::TYPE => 'JWT',
    ];

    private string $secret;

    public function __construct(string $secret)
    {
        $this->secret = $secret;
    }

    /**
     * @throws \Exception
     */
    public function encode(array $payload, array $header = []): string
    {
        $header = array_merge(self::DEFAULT_HEADER, $header);

        $encodedHeader = rtrim(base64_encode(json_encode($header)), '=');
        $encodedPayload = rtrim(base64_encode(json_encode($payload)), '=');
        $signature = $this->sign($header[self::ALGORITHM], $encodedHeader, $encodedPayload);

        return sprintf(
            '%s.%s.%s',
            $encodedHeader,
            $encodedPayload,
            $signature
        );
    }

    /**
     * @throws \Exception
     */
    public function decode(string $token): array
    {
        $token = explode('.', $token, 3);

        return [
            self::HEADER => json_decode(base64_decode($token[0] ?? ''), true),
            self::CLAIMS => json_decode(base64_decode($token[1] ?? ''), true),
            self::SIGNATURE => $token[2] ?? '',
        ];
    }

    /**
     * @throws \Exception
     */
    public function isValid(string $token): bool
    {
        $decoded = $this->decode($token);
        $token = explode('.', $token, 3);
        $signature = $this->sign($decoded[self::HEADER][self::ALGORITHM] ?? '', $token[0] ?? '', $token[1] ?? '');

        return hash_equals($decoded[self::SIGNATURE], $signature);
    }

    /**
     * @throws \Exception
     */
    private function sign(string $hashAlgorithm, string $encodedHeader, string $encodedPayload): string
    {
        if (!in_array($hashAlgorithm, array_keys(self::VALID_ALGOS))) {
            throw new \Exception('Invalid Hash Algorithm.');
        }

        return hash_hmac(self::VALID_ALGOS[$hashAlgorithm], sprintf('%s.%s', $encodedHeader, $encodedPayload), $this->secret);
    }
}
