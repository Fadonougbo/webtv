<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    { 
        /* 'Y-m-d h:i:s' */
       User::create([
        'name'=>'Roland Tohoumon',
        'email'=>'tohoumonroland@gmail.com',
        'password'=>'eliedjima',
        'role'=>'admin',
        'email_verified_at'=>now('africa/porto-novo')->format('Y-m-d h:i:s')
        
       ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $user=User::where('email','=','tohoumonroland@gmail.com');

        if($user->exists()) {
            $user->delete();
        }
    }
};
