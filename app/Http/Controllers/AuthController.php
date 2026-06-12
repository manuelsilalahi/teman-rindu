<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

public function prosesLogin(Request $request)
{
    $email = $request->email;
    $password = $request->password;


   $user = DB::table('users')
    ->where('email', $email)
    ->first();

    if($user && password_verify($password, $user->password))
    {
        session([
            'id' => $user->id,
            'nama' => $user->nama
        ]);

        return redirect('/dashboard');
    }

    return '
<!DOCTYPE html>
<html>
<head>
<title>Login Gagal</title>

<style>

body{
    margin:0;
    font-family:Arial,sans-serif;
    background:linear-gradient(135deg,#ffd6e8,#ffc1dc);
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

.card{
    background:white;
    width:450px;
    padding:40px;
    border-radius:30px;
    text-align:center;
    box-shadow:0 10px 30px rgba(0,0,0,.1);
}

.icon{
    font-size:70px;
}

h1{
    color:#ff4f9a;
}

p{
    color:#666;
    font-size:18px;
}

.btn{
    display:inline-block;
    margin-top:20px;
    padding:15px 30px;
    background:#ff4f9a;
    color:white;
    text-decoration:none;
    border-radius:15px;
    font-weight:bold;
}

.btn:hover{
    background:#ff2f84;
}

</style>
</head>

<body>

<div class="card">

<div class="icon">💔</div>

<h1>LOGIN GAGAL</h1>

<p>
Email atau password yang Anda masukkan salah.
</p>

<a href="/login" class="btn">
Kembali ke Login
</a>

</div>

</body>
</html>
';
}
}