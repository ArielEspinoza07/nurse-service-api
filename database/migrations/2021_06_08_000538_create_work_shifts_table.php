<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateWorkShiftsTable.
 */
class CreateWorkShiftsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_shifts', function (Blueprint $table) {
            $table->id()
                  ->index('work_shifts_id');
            $table->date('work_date')
                  ->index('work_shifts_work_date');
            $table->tinyInteger('extra')
                  ->default(0)
                  ->index('work_shifts_extra');
            $table->unsignedInteger('work_shift_time_id')
                  ->index('work_shifts_time_id');
            $table->unsignedBigInteger('user_id')
                  ->index('work_shifts_user_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('work_shift_time_id')
                  ->references('id')
                  ->on('work_shift_times')
                  ->cascadeOnDelete();

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->cascadeOnDelete();

            $table->index('created_at', 'work_shifts_created_at');
            $table->index('updated_at', 'work_shifts_updated_at');
            $table->index('deleted_at', 'work_shifts_deleted_at');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_shifts');
    }
}
