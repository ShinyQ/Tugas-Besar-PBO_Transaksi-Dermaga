<?php

namespace App\Models;

class User extends Dosen
{
    private $name;
    private $email;
    private $password;
    private $nip;

    public function __construct($name, $email, $password, $nip)
    {
        parent::__construct($nip);
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->nip = $nip;
    }

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];




}
