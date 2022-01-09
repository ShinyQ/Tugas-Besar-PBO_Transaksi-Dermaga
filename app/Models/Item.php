<?php

namespace App\Models;

use ArrivalTime;
use Illuminate\Support\Facades\DB;

class Item implements ArrivalTime
{
    private $table = 'items';
    private $name, $weight;
    private $container, $arrivalTime;

    /**
     * @param $name
     * @param $weight
     * @param $container
     */

    public function __construct($name, $weight, $container)
    {
        $this->name = $name;
        $this->weight = $weight;
        $this->container = $container;
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

    public function get(): \Illuminate\Support\Collection
    {
        return DB::table($this->table)
           ->join('containers', 'items.container_id', '=', 'containers.id')
           ->get();

    }
}
