<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Container
{
    private $id, $number, $type, $size, $ship_id;

    public static function getByShipId($id): \Illuminate\Support\Collection
    {
        return DB::table('containers')->select('*')->where('ship_id', $id)->get();
    }

    public static function getById($id): Container
    {
        return new Container(get_object_vars(
            DB::table('containers')
                ->select('*')
                ->where('id', $id)
                ->first()
        ));
    }

    public function save($id = null): bool
    {
        return DB::table('containers')->updateOrInsert(['id' => $id], [
            'ship_id' => $this->getShipId(),
            'number' => $this->getNumber(),
            'type' => $this->getType(),
            'size' => $this->getSize(),
            'created_at' => Carbon::now()
        ]);
    }

    public static function delete($id) : bool
    {
        return DB::table('containers')->where('id', '=', $id)->delete();
    }

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
