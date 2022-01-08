<?php


namespace App\Models;


use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ItemLiquid extends Item
{
    private $name, $weight, $isFlammable, $volume, $container;
    private $table = 'items';

    /**
     * ItemLiquid constructor.
     * @param $isFlammable
     * @param $volume
     */
    public function __construct($name, $weight, $container, $isFlammable, $volume)
    {
        parent::__construct($name, $weight, $container);
        $this->isFlammable = $isFlammable;
        $this->volume = $volume;
    }

    public function save($id = null): bool
    {
        return DB::table('items')->updateOrInsert(
            [
                'id' => $id
            ], [
                'container_id' => parent::getContainer(),
                'name' => parent::getName(),
                'weight' => parent::getWeight(),
                'isFlammable' => $this->getIsFlammable(),
                'volume' => $this->getVolume(),
                'created_at' => Carbon::now()
            ]
        );
    }
    public function delete($id) : bool
    {
        return DB::table('items')
            ->where('id', '=', $id)
            ->where('isFlammable', "!=", null)
            ->delete();
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
    public function getIsFlammable()
    {
        return $this->isFlammable;
    }

    /**
     * @param mixed $isFlammable
     */
    public function setIsFlammable($isFlammable): void
    {
        $this->isFlammable = $isFlammable;
    }

    /**
     * @return mixed
     */
    public function getVolume()
    {
        return $this->volume;
    }

    /**
     * @param mixed $volume
     */
    public function setVolume($volume): void
    {
        $this->volume = $volume;
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




}
