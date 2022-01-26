<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ItemLiquid extends Item
{
    private $isFlammable, $volume;

    /**
     * ItemLiquid constructor.
     * @param array $item
     * @param $isFlammable
     * @param $volume
     */
    public function __construct(array $item, $isFlammable, $volume)
    {
        parent::__construct($item);
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
