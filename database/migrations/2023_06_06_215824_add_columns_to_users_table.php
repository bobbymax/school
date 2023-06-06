<?php

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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->string('firstname')->after('id');
            $table->string('middlename')->nullable()->after('firstname');
            $table->string('surname')->after('middlename');
            $table->string('matric_no')->unique()->after('surname');
            $table->bigInteger('level_id')->default(0)->after('matric_no');
            $table->bigInteger('department_id')->default(0)->after('level_id');
            $table->bigInteger('program_id')->default(0)->after('department_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name')->after('id');
            $table->dropColumn('firstname');
            $table->dropColumn('middlename');
            $table->dropColumn('surname');
            $table->dropColumn('matric_no');
            $table->dropColumn('level_id');
            $table->dropColumn('department_id');
            $table->dropColumn('program_id');
        });
    }
};
