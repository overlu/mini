<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

use Mini\Database\Mysql\Migrations\Migration;
use Mini\Database\Mysql\Schema\Blueprint;
use Mini\Facades\Schema;

class CreateDemoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('demo', static function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('demo');
    }
}
