<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateMedicalNotesTable.
 */
class CreateMedicalNotesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_notes', function (Blueprint $table) {
            $table->id()
                  ->index('medical_notes_id');
            $table->string('name')
                  ->index('medical_notes_name');
            $table->text('note');
            $table->unsignedBigInteger('medical_note_type_id')
                  ->index('medical_notes_type_id');
            $table->unsignedBigInteger('user_id')
                  ->index('medical_notes_user_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('medical_note_type_id')
                  ->references('id')
                  ->on('medical_note_types')
                  ->cascadeOnDelete();
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->cascadeOnDelete();

            $table->index('created_at', 'medical_notes_created_at');
            $table->index('updated_at', 'medical_notes_updated_at');
            $table->index('deleted_at', 'medical_notes_deleted_at');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medical_notes');
    }
}
