<?php

namespace App\Events;

use App\Dto\BalanceReplenishmentDto;
use App\Http\Requests\TransactionRequest;
use App\Models\Transaction;
use Exception;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class TransactionCreateEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $data;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(BalanceReplenishmentDto $dto)
    {
        $this->validate($dto->getData());

        $this->data = $dto;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }

    public function validate(array $data)
    {
        $validator = Validator::make($data, [
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|numeric',
            'type' => 'required|in:' . implode(',', array_keys(Transaction::types())),
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException(implode(',', array_keys($validator->errors()->messages())));
        }
    }
}
