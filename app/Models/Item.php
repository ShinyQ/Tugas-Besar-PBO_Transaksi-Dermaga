<?php

namespace App\Models;

use ArrivalTime;
use Illuminate\Support\Facades\DB;

abstract class Item
{
    private $id, $name, $weight, $container, $transaction_id;

    public function get(): \Illuminate\Support\Collection
    {
        return DB::table('items')
            ->join('containers', 'items.container_id', '=', 'containers.id')
            ->get();
    }

    public static function getById($id): \Illuminate\Support\Collection
    {
        return DB::table('items')
            ->join('containers', 'items.container_id', '=', 'containers.id')
            ->where('transaction_id', $id)
            ->select('containers.id as container_id', 'containers.number', 'items.*')
            ->get();
    }

    public static function delete($id) : bool
    {
        return DB::table('items')->where('id', '=', $id)->delete();
    }

    /**
     * @param array $data
     */
    public function __construct(array $data = array())
    {
        foreach($data as $key => $value) {
            $this->$key = $value;
        }
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getArrivalTime()
    {
        return $this->arrivalTime;
    }

    /**
     * @param mixed $arrivalTime
     */
    public function setArrivalTime($arrivalTime): void
    {
        $this->arrivalTime = $arrivalTime;
    }

    /**
     * @return mixed
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param mixed $weight
     */
    public function setWeight($weight): void
    {
        $this->weight = $weight;
    }

    /**
     * @return mixed
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * @param mixed $container
     */
    public function setContainer($container): void
    {
        $this->container = $container;
    }

    /**
     * @return mixed
     */
    public function getTransactionId()
    {
        return $this->transaction_id;
    }

    /**
     * @param mixed $transaction_id
     */
    public function setTransactionId($transaction_id): void
    {
        $this->transaction_id = $transaction_id;
    }
}
