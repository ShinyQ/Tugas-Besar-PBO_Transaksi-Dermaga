<?php


namespace App\Models;


use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ItemSolid extends Item
{
    private $name, $weight, $shape, $quantity, $container;
    private $table = 'items';

    public function __construct($name, $weight, $container, $shape, $quantity)
    {
        parent::__construct($name, $weight, $container);
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
                'name' => parent::getName(),
                'weight' => parent::getWeight(),
                'shape' => $this->getShape(),
                'quantity' => $this->getQuantity(),
                'created_at' => Carbon::now()
            ]
        );
    }
    public function delete($id) : bool
    {
        return DB::table('items')
            ->where('id', '=', $id)
            ->where('shape', '!=', null)
            ->delete();
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
