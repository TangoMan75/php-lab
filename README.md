![GH language](https://img.shields.io/github/languages/top/TangoMan75/php-lab)
[![GH release](https://img.shields.io/github/v/release/TangoMan75/php-lab)](https://github.com/TangoMan75/php-lab/releases)
[![GH license](https://img.shields.io/github/license/TangoMan75/php-lab)]((https://github.com/TangoMan75/php-lab/blob/main/LICENSE))
[![GH stars](https://img.shields.io/github/stars/TangoMan75/php-lab)](https://github.com/TangoMan75/php-lab/stargazers)
[![Node CI](https://github.com/TangoMan75/php-lab/workflows/PHP%20CI/badge.svg)](https://github.com/TangoMan75/php-lab/actions/workflows/php8.2.yml)
![Visitors](https://api.visitorbadge.io/api/visitors?path=https%3A%2F%2Fgithub.com%2FTangoMan75%2Fphp-lab&labelColor=%23697689&countColor=%2337d67a&style=flat)

🔬 TangoMan PHP Lab
===================

#back-end #interview #practice #php #technical-interview #test #training #vanilla

**🔬 TangoMan PHP Lab** is a PHP coding project for practicing common interview questions and coding challenges.

There are various PHP scripts in the root directory that implement different algorithms and solutions to coding problems:

1. 🔄 **Ackermann**

Implements the Ackermann function, which is a classic example of a recursive function that can be used to test compilers and illustrate the concept of recursion.

2. 🔍 **BinarySearch**

Implements binary search to find an element in a sorted array. Binary search is an efficient algorithm for searching sorted data sets and relies on the divide-and-conquer technique.

3. ➕ **Factorial**

Calculates factorials recursively. Factorials are used in combinatorics and provide good examples of recursive functions.

4. 🔢 **Fibonacci**

Generates Fibonacci numbers recursively. The Fibonacci sequence illustrates recursion and has applications in mathematics and nature.

5. 💬 **FizzBuzz**

Prints numbers 1 to 100, but prints "Fizz" for multiples of 3, "Buzz" for multiples of 5, and "FizzBuzz" for multiples of both. This is a common interview screening question.

6. 👋 **HelloWorld**

Prints "Hello world!" - the traditional first program for beginner programmers.

7. ❄️ **MinTemperature**

Finds minimum temperature value from temperature data. Demonstrates algorithms for finding minimum/maximum values.

8. 🔄 **Palindrome**

Checks if a string is a palindrome. Palindromes illustrate recursion and string manipulation.

9. ✔️ **Perfect**

Checks if a number is a perfect number, where the number equals the sum of its divisors. Interesting math and recursion example.

10. 🃏 **Poker**

Evaluates poker hands. Involves evaluating combinations and ranks of cards.

11. 🥇 **PrimeNumbers**

Checks if a number is prime, where a natural number greater than 1 has no positive divisors other than 1 and itself.

12. 🔄 **Rot13**

Encodes/decodes a string using the ROT13 cipher, a simple letter substitution cipher. Basic encryption example.

13. 🔑 **SimpleJWT**

Implements JSON Web Token (JWT) encoding and decoding.

14. 💹 **Stocks**

Return an array holding the names of the top three stocks with the best average performance given two separate arrays containing stocks names and prices.

15. 🔢 **Syracuse**

Implements the Syracuse algorithm/sequence. Interesting recursion and number theory example.

16. 🏗️ **TowerOfHanoi**

Implements the Tower of Hanoi algorithm. A classic algorithm that illustrates recursion and dynamic programming.

17. 🔄 **VonNeumann**

Generates Von Neumann ordinal numbers. Illustrates generating recursive sequences.

✅ Unit Tests
-------------

The `tests` directory in each folder contains `PHPUnit` test cases for testing the implementations of each algorithm.

🚀 Github Actions
-----------------

This project uses Github Actions for continuous integration and testing. The `.github/workflows` directory contains YAML workflow definitions for:

- Linting: Runs `php-cs-fixer` to check code style and quality on every push and pull request.
- Testing: Runs the PHUnit tests.

The workflows help maintain code quality and ensure the tests pass on multiple php versions.

📑 Documentation
----------------

PHPUnit documentation is available here: [https://docs.phpunit.de](https://docs.phpunit.de)

php-cs-fixer documentation is available here: [https://cs.symfony.com/doc/rules/index.html](https://cs.symfony.com/doc/rules/index.html)

🌟 Inspiration
--------------

The following YouTube videos inspired **TangoMan PHP Lab** project:

- [FizzBuzz: One Simple Interview Question](https://www.youtube.com/watch?v=QPZ0pIK_wsc)
- [Solve This Coding Question To Win $200](https://www.youtube.com/watch?v=WDuZ_S_9vLg)
- [The Most Difficult Program to Compute? - Computerphile](https://www.youtube.com/watch?v=i7sm9dzFtEI)

💻 Dependencies
---------------

**TangoMan PHP Lab** requires the following dependencies:

- PHP
- Composer

---

### 🐘 PHP

Learn how to install PHP from official documentation [here](https://www.php.net/manual/en/install.php)

#### 🐧 Install PHP (Linux)

On linux machine enter following commands

```bash
$ sudo add-apt-repository --assume-yes ppa:ondrej/php
$ sudo apt-get update
$ sudo apt-get install --assume-yes php8.2
```

---

### 📦 Composer

Learn how to install Composer from official documentation [here](https://getcomposer.org/download/)

#### 🐧 Install Composer (Linux)

On linux machine install composer globally with the following commands (requires php):

```bash
# download binary
$ php -r "copy('https://getcomposer.org/composer-stable.phar', 'composer.phar');"
# install composer globally
$ sudo mv composer.phar /usr/local/bin/composer
# fix permissions
$ sudo chmod uga+x /usr/local/bin/composer
$ sync
# install symfony flex globally to speed up download of composer packages (parallelized prefetching)
$ composer global require 'symfony/flex' --prefer-dist --no-progress --no-suggest --classmap-authoritative
$ composer clear-cache
```

🚀 Installation
---------------

### ⚡ Step 1: Simply enter following command in your terminal

```bash
sh entrypoint.sh install
```

🔥 Usage
--------

Run `sh entrypoint.sh` to print help

Run tests:

```bash
sh entrypoint.sh unit
```

Lint code:

```bash
sh entrypoint.sh lint
```

Fix lint errors:

```bash
sh entrypoint.sh lint --fix
```

Uninstall:

```bash
sh entrypoint.sh uninstall
```

🤝 Contributing
---------------

Thank you for your interest in contributing to **TangoMan PHP Lab**.

Please review the [code of conduct](./CODE_OF_CONDUCT.md) and [contribution guidelines](./CONTRIBUTING.md) before starting to work on any features.

If you want to open an issue, please check first if it was not [reported already](https://github.com/TangoMan75/php-lab/issues) before creating a new one.

📜 License
----------

Copyrights (c) 2024 &quot;Matthias Morin&quot; &lt;mat@tangoman.io&gt;

[![License](https://img.shields.io/badge/Licence-MIT-green.svg)](LICENSE)
Distributed under the MIT license.

If you like **TangoMan PHP Lab** please star, follow or tweet about it:

[![GitHub stars](https://img.shields.io/github/stars/TangoMan75/php-lab?style=social)](https://github.com/TangoMan75/php-lab/stargazers)
[![GitHub followers](https://img.shields.io/github/followers/TangoMan75?style=social)](https://github.com/TangoMan75)
[![Twitter](https://img.shields.io/twitter/url?style=social&url=https%3A%2F%2Fgithub.com%2FTangoMan75%2Fphp-lab)](https://twitter.com/intent/tweet?text=Wow:&url=https%3A%2F%2Fgithub.com%2FTangoMan75%2Fphp-lab)

... And check my other cool projects.
