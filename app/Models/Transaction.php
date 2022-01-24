<?php


namespace App\Models;


use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Transaction
{
    private $id, $user_id, $totalCost, $totalWeight;

    public static function get(): \Illuminate\Support\Collection
    {
        return DB::table('transactions')
            ->join('users', 'transactions.user_id', '=', 'users.id')
            ->get();
    }

    public static function deleteUnusedTransaction(): int
    {
        return DB::table('transactions')->select('*')->where('totalWeight', 0)->delete();
    }

    public static function getById($id): Transaction
    {
        return new Transaction(get_object_vars(
            DB::table('transactions')
                ->select('*')
                ->where('id', $id)
                ->first()
        ));
    }

    public static function getByUserId($id): Transaction
    {
        return new Transaction(get_object_vars(
            DB::table('transactions')
                ->select('*')
                ->where('user_id', $id)
                ->get()
        ));
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

    public static function getItems($id): \Illuminate\Support\Collection
    {
        return DB::table('items')->select('*')->where('transaction_id', "=", $id)->get();
    }

    public static function getTotalWeightItems($id)
    {
        return DB::table('items')
            ->select('weight')
            ->where('transaction_id', "=", $id)
            ->sum('weight');
    }

    /**
     * Transaction constructor.
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
