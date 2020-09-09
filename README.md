# Laravel Barrier

This package is used for handling pre-conditions before implementing any job in controller, along with built-in Middleware and Form Request of Laravel.

[![Latest Stable Version](https://poser.pugx.org/sonleu/barrier/v)](//packagist.org/packages/sonleu/barrier)
[![Total Downloads](https://poser.pugx.org/sonleu/barrier/downloads)](//packagist.org/packages/sonleu/barrier)
[![Latest Unstable Version](https://poser.pugx.org/sonleu/barrier/v/unstable)](//packagist.org/packages/sonleu/barrier)
[![License](https://poser.pugx.org/sonleu/barrier/license)](//packagist.org/packages/sonleu/barrier)

## Table of Contents

- <a href="#installation">Installation</a>
    - <a href="#composer">Composer</a>

- <a href="#usage">Usage</a>
    - <a href="#generators">Generators</a>
    - <a href="#use-methods">Use methods</a>
    
## Installation

### Composer

Execute the following command to get the latest version of the package:

```terminal
composer require sonleu/barrier
```

## Usage

### Generators

Create your barriers easily through the generator.

#### Commands

```terminal
php artisan make:barrier MyBarrier
```

This will create a Barrier file inside App/Barriers folder.

#### Example

```php
namespace App\Barriers;

use SonLeu\Barrier\BarrierInterface;

class FooBarrier implements BarrierInterface
{
    protected $argument;

    // You can pass any argument here
    public function __construct ($argument) 
    {
        $this->argument = $argument;
    }

    /**
     * @return bool
     */
    public function passes(): bool
    {
        if (SOMETHING_SHOULD_NOT_BE_ALLOWED) {
            return false;
        }

        return true;
    }

    /**
     * @return string
     */
    public function message(): string
    {
        return 'Your message if not pass';
    }
}
```

### Use methods

You can use Barriers anywhere inside your controller or even in your business logic layers.

It should be put above your logic.

```php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SonLeu\Barrier\HasBarrier;
use SonLeu\Barrier\Exceptions\BarrierNotPassedException;

class FooController extends Controller 
{
    use HasBarrier;

    public function bar(Request $request)
    {
        try {
            $this->barrier([
                new CheckIfTuesdayBarrier(),
                new CheckVirginityBarrier(auth()->user()),
            ]);
        } catch (BarrierNotPassedException $e) {
            return back()->with('error', $e->getMessage());
        }

        //TODO: your logic
    }
}
```

