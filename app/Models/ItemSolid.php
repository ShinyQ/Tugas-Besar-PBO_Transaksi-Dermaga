<?php


namespace App\Models;


use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ItemSolid extends Item
{
    private $shape, $quantity;

    public function __construct($id, $transaction_id, $name, $weight, $container, $shape, $quantity)
    {
        parent::__construct([
            'id' => $id,
            'transaction_id' => $transaction_id,
            'container' => $container,
            'weight' => $weight,
            'name' => $name
        ]);

        $this->shape = $shape;
        $this->quantity = $quantity;
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
                'shape' => $this->getShape(),
                'quantity' => $this->getQuantity(),
                'created_at' => Carbon::now()
            ]
        );
    }

    /**
     * @return mixed
     */
    public function getShape()
    {
        return $this->shape;
    }

    /**
     * @param mixed $shape
     */
    public function setShape($shape): void
    {
        $this->shape = $shape;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity): void
    {
        $this->quantity = $quantity;
    }
}
