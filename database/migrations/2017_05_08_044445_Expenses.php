<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Expenses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		Schema::create('expenses', function(Blueprint $table){
			$table->increments('id');
			$table->integer('purchased_by');
			$table->string('description');
			$table->float('amount');
            $table->date('purchased_at');
            $table->text('bills');
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
        //
		Schema::dropIfExists('expenses');
    }
}
