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
        Schema::table('projects', function (Blueprint $table) {
            $table->unsignedBigInteger('type_id')->nullable();
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');

            //alternativa ai metodi precedenti N.B solo se hai rispettato le convenzioni
            //$table->foreignId('type_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // 2. rimuvi il vincolo
            //$table->dropForeign(['type_id']); // metodo stretto
            $table->dropForeign('projects_type_id_foreign'); // nome del vincolo
            // 1. rimuovi la colonna 'type_id'
            $table->dropColumn('type_id');
        });
    }
};
