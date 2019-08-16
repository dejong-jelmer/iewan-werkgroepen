<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBinderFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('binder_forms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('key', 100)->unique();
            $table->string('name');
            $table->json('fields');
            $table->binary('response')->nullable();
            $table->timestamp('expires')->nullable();
            $table->timestamp('filled_in')->nullable();
            $table->boolean('released')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('binder_forms');
    }
}
