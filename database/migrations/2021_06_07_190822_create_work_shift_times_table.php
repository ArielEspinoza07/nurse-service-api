<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateWorkShiftTimesTable.
 */
class CreateWorkShiftTimesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_shift_times', function (Blueprint $table) {
            $table->increments('id')
                  ->index('work_shift_times_id');
            $table->string('name')
                  ->index('work_shift_times_name');
            $table->time('start_at')
                  ->nullable()
                  ->index('work_shift_times_start_at');
            $table->time('end_at')
                  ->nullable()
                  ->index('work_shift_times_end_at');
            $table->timestamps();
            $table->softDeletes();

            $table->index('created_at', 'work_shift_times_created_at');
            $table->index('updated_at', 'work_shift_times_updated_at');
            $table->index('deleted_at', 'work_shift_times_deleted_at');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_shift_times');
    }
}
