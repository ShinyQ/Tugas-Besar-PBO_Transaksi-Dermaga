<?php


namespace App\Models;

use Illuminate\Support\Facades\DB;

class Ship
{
    private $table = 'ships';
    private $number, $name, $arrivalTime;

    /**
     * Ship constructor.
     * @param string $table
     * @param $number
     * @param $name
     * @param $arrivalTime
     */
    public function __construct(string $number, $name, $arrivalTime)
    {
        $this->number = $number;
        $this->name = $name;
        $this->arrivalTime = $arrivalTime;
    }
    public function save(): bool
    {
        return DB::insert('insert into '. $this->table .' (number, name, arrivalTime) values (?, ?, ?)',
            [
                $this->getNumber(),
                $this->getName(),
                $this->getArrivalTime()
            ]
        );
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @param string $number
     */
    public function setNumber(string $number): void
    {
        $this->number = $number;
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




}
