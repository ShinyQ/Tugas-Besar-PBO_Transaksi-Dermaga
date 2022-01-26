<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class User
{
    private $id, $name, $email, $password, $address, $phone, $is_admin;

    public static function login($email, $password)
    {
        $user = DB::table('users')
            ->where('email', $email)
            ->where('password', $password)
            ->first();

        if (!empty($user)){
            return new User(get_object_vars($user));
        }

        return $user;
    }

    public static function get(): \Illuminate\Support\Collection
    {
        return DB::table('users')
            ->select('*')
            ->where('is_admin', 0)
            ->orderBy('created_at', 'DESC')
            ->get();
    }

    public function save($id = null): bool
    {
        return DB::table('users')->updateOrInsert(
            [
                'id' => $id
            ], [
                'name'       => $this->getName(),
                'email'      => $this->getEmail(),
                'password'   => $this->getPassword(),
                'phone'      => $this->getPhone(),
                'address'    => $this->getAddress(),
                'is_admin'   => $this->getIsAdmin(),
                'created_at' => Carbon::now()
            ]
        );
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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address): void
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getIsAdmin()
    {
        return $this->is_admin;
    }

    /**
     * @param mixed $is_admin
     */
    public function setIsAdmin($is_admin): void
    {
        $this->is_admin = $is_admin;
    }
}
