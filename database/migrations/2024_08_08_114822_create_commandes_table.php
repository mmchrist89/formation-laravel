<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("produit_id")->index();
            $table->foreign("produit_id")->references("id")->on("commandes")->cascadeOnDelete();
            $table->integer('qte');
            $table->decimal('prix',15,2);
            $table->decimal('prix_total',15,2);
            $table->string('client',255);
            $table->date('date')->default(Carbon::now());
            $table->enum('etat',['En attente','Payée','En livraison','Annulée'])->default('En attente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};
