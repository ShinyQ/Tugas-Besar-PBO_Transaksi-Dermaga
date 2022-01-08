<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Container
{
    private $table = 'containers';
    private $number, $type, $size, $ship_id;

    public function save($id = null): bool
    {
        return DB::table('containers')->updateOrInsert(
            [
                'id' => $id
            ], [
                'ship_id' => $this->getShipId(),
                'number' => $this->getNumber(),
                'type' => $this->getType(),
                'size' => $this->getSize(),
                'created_at' => Carbon::now()
            ]
        );
    }

    public function delete($id) : bool
    {
        return DB::table('containers')->where('id', '=', $id)->delete();
    }

    public function __construct($ship_id, $number, $type, $size)
    {
        $this->ship_id = $ship_id;
        $this->number = $number;
        $this->type = $type;
        $this->size = $size;
    }

    /**
     * @return mixed
     */
    public function getShipId()
    {
        return $this->ship_id;
    }

    /**
     * @param mixed $ship_id
     */
    public function setShipId($ship_id): void
    {
        $this->ship_id = $ship_id;
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
