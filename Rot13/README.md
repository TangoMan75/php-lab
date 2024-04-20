Rot13
===

#string #cryptography

This script is a simple implementation of the Rot13 cipher.

## 📑 Overview

This script is a simple implementation of the _ROT13_ cipher, which is a type of substitution cipher.
The _ROT13_ algorithm shifts each letter by _13_ positions forward in the alphabet, wrapping around if necessary.
So _"A"_ becomes _"N"_, _"B"_ becomes _"O"_, and so on. This weak encryption method is commonly used to obfuscate text. Applying _ROT13_ on text twice decrypts it back to the original text.

## 📚 Implementation Details

The `rot13` method takes a `string` input and returns the _ROT13_ encrypted `string`. It loops through each character in the input string. For alphabetic characters, it gets the _ASCII code_, offsets it from the base _ASCII_ code for upper or lower case letters, adds _13_, and `mods` _26_ to wrap around the alphabet. This shifts the letter _13_ positions. The rotated _ASCII code_ is converted back to a character and appended to the result string. Non-alphabetic characters are appended unchanged.

After looping through all characters, the result string containing the _ROT13_ encrypted text is returned. So plain text _"Hello"_ would get encrypted to _"Uryyb"_.

The main logic flow is:

- 1. Loop each character
- 2. Check if alphabetic
- 3. Rotate _ASCII code_ +13
- 4. Convert back to character
- 5. Append to result

## ⏳ TLDR;

In summary, this script defines a simple _ROT13_ encryption class, it allows _ROT13_ to take a plain text string input and apply the _ROT13_ algorithm to produce an obfuscated output string. The logic transforms each character while preserving case and non-alphabetic characters.
