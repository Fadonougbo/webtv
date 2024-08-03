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
        /* User::create([
            'name'=>'Roland Tohoumon',
            'email'=>'',
            'email_verified_at'=>now('africa/porto-novo')->format('Y-m-d H:i:s'),
            'password'=>''
        ]); */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('default_user');
    }
};
