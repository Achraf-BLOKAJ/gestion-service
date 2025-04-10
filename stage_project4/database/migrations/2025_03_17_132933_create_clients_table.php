<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('client_name', 50);
            $table->string('entreprise_name')->nullable();
            $table->date('date_demande');
            $table->string('origine_demande');
            $table->string('contact')->unique();
            $table->string('type_besoin');
            $table->string('categorie_besoin')->nullable(); // deviens nullable à cause du type 'autre'
            $table->string('nature_service', 50)->nullable();
            $table->string('marchandiz', 50)->nullable();
            $table->string('autre_besoin')->nullable(); // nouveau champ
            $table->string('nom_commerciale')->nullable();
            $table->date('date_visite');
            $table->string('type_cadence');
            $table->string('autre_type_cadence')->nullable(); // nouveau champ
            $table->string('client_address', 100);
            $table->string('detail_service');
            $table->string('intervention');
            $table->softDeletes();
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
