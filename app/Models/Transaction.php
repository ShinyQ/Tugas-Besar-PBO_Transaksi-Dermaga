<?php


namespace App\Models;


use App\Interfaces\ArrivalTime;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Transaction implements ArrivalTime
{
    private $id, $user_id, $ship_id, $totalCost, $totalWeight, $arrivalTime;

    public static function getTimeArrival($id): string
    {
        $transaction = DB::table('transactions')->where('id', $id)->first();

        $date = strtotime($transaction->arrivalTime);
        $diff = $date - time();
        $days = floor($diff / (60 * 60 * 24));
        $hours = round(($diff - $days* 60 * 60 * 24) / (60 * 60));

        return $days * -1 ." Hari ". $hours ." Jam";
    }

    public static function updateTransactionWeight($action, $id, $weight): bool
    {
        $transaction = DB::table('transactions')->where('id', $id)->first();

        if($action == 'add') {
            return DB::table('transactions')->updateOrInsert(
                ['id' => $id],
                ['totalWeight' => $transaction->totalWeight + $weight]
            );
        }

        return DB::table('transactions')->updateOrInsert(
            ['id' => $id],
            ['totalWeight' => $transaction->totalWeight - $weight]
        );
    }


    public static function get(): \Illuminate\Support\Collection
    {
        return DB::table('transactions')
            ->select(
                'transactions.id',
                'transactions.created_at',
                'transactions.arrivalTime',
                'transactions.totalCost',
                'transactions.totalWeight',
                'users.name'
            )
            ->join('users', 'transactions.user_id', '=', 'users.id')
            ->orderBy('transactions.created_at', 'DESC')
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

    public static function getByUserId($id): \Illuminate\Support\Collection
    {
        return DB::table('transactions')
            ->select('*')
            ->where('user_id', $id)
            ->get();

    }

    public function save($id = null): bool
    {
        return DB::table('transactions')->updateOrInsert(['id' => $id], [
            'user_id' => $this->getUserId(),
            'ship_id' => $this->getShipId(),
            'arrivalTime' => $this->getArrivalTime(),
            'totalCost' => $this->getTotalCost(),
            'totalWeight' => $this->getTotalWeight(),
            'created_at' => Carbon::now()
        ]);
    }

    public static function delete($id) : bool
    {
        return DB::table('transactions')->where('id', $id)->delete();
    }

    public static function getItems($id): \Illuminate\Support\Collection
    {
        return DB::table('items')->select('*')->where('transaction_id', $id)->get();
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
