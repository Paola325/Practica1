<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Events\PedidoRealizado;
use App\Listeners\EnviarCorreoPedido;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        PedidoRealizado::class => [
            EnviarCorreoPedido::class,
        ],
    ];

    public function boot(): void
    {
        parent::boot();
    }

    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
