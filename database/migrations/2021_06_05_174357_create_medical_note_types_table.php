<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateMedicalNoteTypesTable.
 */
class CreateMedicalNoteTypesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_note_types', function (Blueprint $table) {
            $table->id()
                  ->index('medical_note_types_id');
            $table->string('name')
                  ->index('medical_note_types_name');
            $table->timestamps();
            $table->softDeletes();

            $table->index('created_at', 'medical_note_types_created_at');
            $table->index('updated_at', 'medical_note_types_updated_at');
            $table->index('deleted_at', 'medical_note_types_deleted_at');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medical_note_types');
    }
}
