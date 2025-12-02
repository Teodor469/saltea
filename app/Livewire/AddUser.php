<?php

namespace App\Livewire;

use Livewire\Component;

class AddUser extends Component
{
    public $name;
    public $email;
    public $password;

    protected $rules = [];

    public function registerUser()
    {
        //!Add custom middleware only for Admins to be able to use that
    }

    public function showUser()
    {

    }

    public function editUser()
    {
        //!Add custom middleware only for Admins to be able to use that
    }

    public function updateUser()
    {
        //!Add custom middleware only for Admins to be able to use that
    }

    public function deleteUser()
    {
        //!Add custom middleware only for Admins to be able to use that
    }
    public function render()
    {
        return view('livewire.add-user');
    }
}
