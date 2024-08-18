<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoleToUsersTable extends Migration
{
    /**
     * Apply the migration.
     *
     * @return void
     */
    public function up()
    {
        // Adding the 'role' column to the 'users' table.
        Schema::table('users', function (Blueprint $table) {
            // Adding a 'role' column of type string with a default value of 'user'.
            $table->string('role')->default('user');
        });
    }

    /**
     * Revert the migration.
     *
     * @return void
     */
    public function down()
    {
        // Dropping the 'role' column from the 'users' table.
        Schema::table('users', function (Blueprint $table) {
            // Dropping the 'role' column.
            $table->dropColumn('role');
        });
    }
}
