<?php


namespace App\Models;

use Carbon\Carbon;
use App\Interfaces\ArrivalTime;
use Illuminate\Support\Facades\DB;

class Ship implements ArrivalTime
{
    private $id, $number, $name, $arrivalTime;

    public static function getTimeArrival($id): string
    {
        $ship =  DB::table('ships')
            ->select('*')
            ->where('id', $id)
            ->first();

        $datestr = $ship->arrivalTime;
        $date = strtotime($datestr);
        $diff = $date - time();
        $days = floor($diff / (60 * 60 * 24));
        $hours = round(($diff - $days* 60 * 60 * 24) / (60 * 60));

        return "$days Hari $hours Jam";
    }

    public static function get(): \Illuminate\Support\Collection
    {
        return DB::table('ships')->select('*')->get();
    }

    public static function getById($id): Ship
    {
        return new Ship(get_object_vars(
            DB::table('ships')
                ->select('*')
                ->where('id', $id)
                ->first()
        ));
    }

    public function save($id = null): bool
    {
        return DB::table('ships')->updateOrInsert(['id' => $id], [
            'number' => $this->getNumber(),
            'name' => $this->getName(),
            'arrivalTime' => $this->getArrivalTime(),
            'created_at' => Carbon::now()
        ]);
    }

    public static function delete($id) : bool
    {
        return DB::table('ships')->where('id', '=', $id)->delete();
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
