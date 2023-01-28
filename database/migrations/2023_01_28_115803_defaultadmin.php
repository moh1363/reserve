<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
        $defaultAdminUser->codemelli='0533481341';
        $defaultAdminUser->role='1';
        $defaultAdminUser->password = bcrypt('admin');
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
