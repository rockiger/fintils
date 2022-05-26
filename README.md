## Fintils

Utilitis for financial calculation that are not present in MathPHP.

## Installation

This project using composer.

```
$ composer require rockiger/fintils
```

## Usage

Genrate random password.

```php
<?php

use Rockiger\Fintils;

// Calculate the return of the given prices:
//[0, 0.1, 0.0454545454545454, -0.0869565217391305, -0.0476190476190477]
$returns = Fintils::Rs([100, 110, 115, 105, 100])

```
