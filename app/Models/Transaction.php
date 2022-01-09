<?php


namespace App\Models;


use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Transaction
{
    private $user_id, $totalCost, $totalWeight;

    /**
     * Transaction constructor.
     * @param $totalCost
     * @param $totalWeight
     */
    public function __construct($user_id, $totalCost, $totalWeight)
    {
        $this->user_id = $user_id;
        $this->totalCost = $totalCost;
        $this->totalWeight = $totalWeight;
    }

    public static function get(): \Illuminate\Support\Collection
    {
        return DB::table('transactions')->select('*')->get();
    }

    public static function getById($id)
    {
        return DB::table('transactions')->select('*')->where('id', $id)->first();
    }

    public function save($id = null): bool
    {
        return DB::table('transactions')->updateOrInsert(['id' => $id], [
            'user_id' => $this->getUserId(),
            'totalCost' => $this->getTotalCost(),
            'totalWeight' => $this->getTotalWeight(),
            'created_at' => Carbon::now()
        ]);
    }

    public static function delete($id) : bool
    {
        return DB::table('transactions')->where('id', '=', $id)->delete();
    }

    public static function getItems($id)
    {
        return DB::table('items')->select('*')->where('transaction_id', "=", $id)->get();
    }

    public static function getTotalWeightItems($id)
    {
        return DB::table('items')->select('weight')->where('transaction_id', "=", $id)->sum();
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id): void
    {
        $this->user_id = $user_id;
    }



    /**
     * @return mixed
     */
    public function getTotalCost()
    {
        return $this->totalCost;
    }

    /**
     * @param mixed $totalCost
     */
    public function setTotalCost($totalCost): void
    {
        $this->totalCost = $totalCost;
    }

    /**
     * @return mixed
     */
    public function getTotalWeight()
    {
        return $this->totalWeight;
    }

    /**
     * @param mixed $totalWeight
     */
    public function setTotalWeight($totalWeight): void
    {
        $this->totalWeight = $totalWeight;
    }




}
