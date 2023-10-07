# Password Manager

-   a simple custom template using `Filament V.2` include:

    -   Registering users by `username` and `password`.
    -   user can update profile.
    -   `Active` and `Deactive` users.
    -   `Activity logs` and `Exception` and `Screenlock` packages.
    -   with 2 languages `ckb` and `en`.

<p align="center">
    <img src="https://user-images.githubusercontent.com/41773797/131910226-676cb28a-332d-4162-a6a8-136a93d5a70f.png" alt="Banner" style="width: 100%; max-width: 800px;" />
</p>

<p align="center">
    <a href="https://laravel.com"><img alt="Laravel v9.x" src="https://img.shields.io/badge/Laravel-v9.x-FF2D20?style=for-the-badge&logo=laravel"></a>
    <a href="https://laravel-livewire.com"><img alt="Livewire v2.x" src="https://img.shields.io/badge/Livewire-v2.x-FB70A9?style=for-the-badge"></a>
    <a href="https://php.net"><img alt="PHP v8.x" src="https://img.shields.io/badge/PHP-8.0-777BB4?style=for-the-badge&logo=php"></a>
</p>

## Setup

```
    git clone
```

```
    cd filamnet-password-manager
```

```
    cp .env.example .env
```

```
    composer install -o
```

```
    pnpm install
```

```
    php artisan migrate
```

```
    pnpm fresh
    pnpm clear
```

```
    php artisan key:generate
```

```
    php artisan serve & pnpm dev
```

-   the default username: `admin` and password: `password` for login.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
