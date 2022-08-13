<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUsersAdvertisements(){
        $userId = request('users-advertisements');
        $advertisements = User::getUsersAvertisements($userId);
        return $advertisements;
    }
}
