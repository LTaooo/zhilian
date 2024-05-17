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
        if (Schema::hasTable('zhilian')) { return; }

        Schema::create('zhilian', function (Blueprint $table) {
            $table->id();
$table->creatorId();
$table->createdAt();
$table->updatedAt();
$table->deletedAt();

$table->engine='InnoDB';
$table->comment('zhilian');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zhilian');
    }
};
