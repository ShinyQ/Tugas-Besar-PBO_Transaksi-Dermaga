<?php


namespace App\Models;


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

    public function save(): bool
    {
        return DB::insert('insert into '. $this->table .'(container_id, name, weight, shape, quantity) values (?, ?, ?, ?, ?)',
            [
                parent::getContainer(),
                parent::getName(),
                parent::getWeight(),
                $this->getShape(),
                $this->getQuantity()
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
