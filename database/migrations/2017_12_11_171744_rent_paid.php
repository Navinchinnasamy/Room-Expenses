<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RentPaid extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		Schema::create('paid_rents', function(Blueprint $table){
			$table->increments('id');
			$table->integer('paid_by');
			$table->date('paid_at');
			$table->float('total_amount');
			$table->float('equal_share');
			$table->text('share_details');
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
		Schema::dropIfExists('paid_rents');
    }
}
