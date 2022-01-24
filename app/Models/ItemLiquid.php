<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ItemLiquid extends Item
{
    private $isFlammable, $volume;

    /**
     * ItemLiquid constructor.
     * @param $id
     * @param $transaction_id
     * @param $name
     * @param $weight
     * @param $container
     * @param $isFlammable
     * @param $volume
     */
    public function __construct($id, $transaction_id, $name, $weight, $container, $isFlammable, $volume)
    {
        parent::__construct([
            'id' => $id,
            'transaction_id' => $transaction_id,
            'container' => $container,
            'weight' => $weight,
            'name' => $name
        ]);

        $this->isFlammable = $isFlammable;
        $this->volume = $volume;
    }

    public function save($id = null): bool
    {
        return DB::table('items')->updateOrInsert(
            [
                'id' => $id
            ], [
                'container_id' => parent::getContainer(),
                'transaction_id' => parent::getTransactionId(),
                'name' => parent::getName(),
                'weight' => parent::getWeight(),
                'isFlammable' => $this->getIsFlammable(),
                'volume' => $this->getVolume(),
                'created_at' => Carbon::now()
            ]
        );
    }

    /**
     * @return mixed
     */
    public function getIsFlammable()
    {
        return $this->isFlammable;
    }

    /**
     * @param mixed $isFlammable
     */
    public function setIsFlammable($isFlammable): void
    {
        $this->isFlammable = $isFlammable;
    }

    /**
     * @return mixed
     */
    public function getVolume()
    {
        return $this->volume;
    }

    /**
     * @param mixed $volume
     */
    public function setVolume($volume): void
    {
        $this->volume = $volume;
    }
}
