<?php

namespace App\Listeners;

use App\Events\TransactionCreateEvent;
use App\Services\Crud\TransactionCrudService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class TransactionCreateListener
{

    private $service;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(TransactionCrudService $service)
    {
        $this->service = $service;
    }

    /**
     * Handle the event.
     *
     * @param  TransactionCreateEvent  $event
     * @return void
     */
    public function handle(TransactionCreateEvent $event)
    {
        try {
            $this->service->create($event->data);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
