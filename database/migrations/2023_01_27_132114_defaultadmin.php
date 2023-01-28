<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $defaultAdminUser = new \App\Models\User();
        $defaultAdminUser->name='admin';
        $defaultAdminUser->codemelli = '1234567890';
        $defaultAdminUser->password = bcrypt('admin');
        $defaultAdminUser->role ='1';
        $defaultAdminUser->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
