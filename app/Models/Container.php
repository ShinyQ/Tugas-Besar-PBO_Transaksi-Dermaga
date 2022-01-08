<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Container
{
    private $table = 'containers';
    private $number, $type, $size;

    public function save(): bool
    {
        return DB::insert('insert into '. $this->table .' (number, type, size) values (?, ?, ?)',
            [
                $this->getNumber(),
                $this->getType(),
                $this->getSize()
            ]
        );
    }

    public function __construct($number, $type, $size)
    {
        $this->number = $number;
        $this->type = $type;
        $this->size = $size;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number): void
    {
        $this->number = $number;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param mixed $size
     */
    public function setSize($size): void
    {
        $this->size = $size;
    }
}