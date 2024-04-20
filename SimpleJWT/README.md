SimpleJWT
===

#advanced #cryptography

This script is an implementation of JWT generator / validator.

## 📑 Overview

This is a simple library for generating and validating _JSON Web Tokens_.
_JWTs_ are a way to securely transmit information between parties as a _JSON_ object.
It supports _JWT_ signing using _HMAC_ and _RSA_ algorithms.

## 📚 Implementation Details

The class takes in a secret string in the constructor. This secret will be used to generate the signature of the JWT.

The main methods are:

1. **encode**

This takes a payload and an optional header as inputs.
The header contains metadata like the algorithm used.
The payload contains the claims or data to encode.
It encodes the header and payload into _base64_ strings. It signs them using the _HMAC_ algorithm based on the secret. It returns a _JWT_ string with the encoded header, payload, and signature joined by periods.

2. **decode**

This takes in a _JWT_ string. It splits the string into the encoded header, payload, and signature. It _base64_ decodes the header and payload. It returns the header, claims (payload), and signature.

3. **sign**

This generates the signature by taking the encoded header, encoded payload, and secret. It hashes them together using HMAC and the algorithm specified in the header (HS256, HS384 etc).

4. **is_valid**

This verifies if a given _JWT_ is valid by decoding it, regenerating the signature, and comparing it to the one provided.
This validates that the JWT has not been tampered with.

## ⏳ TLDR;

Overall, the `JwtEncoder` provides methods to encode claims into a compact _JWT_ string for transmission, decode the string back into claims, and validates the integrity of the token through signature verification.
The secret provides cryptographic security to the JWT.
