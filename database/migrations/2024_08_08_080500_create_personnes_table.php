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
        Schema::create('personnes', function (Blueprint $table) {
            $table->id();
            $table->string("nom",100);
            $table->string("prenom",100)->nullable();
            $table->enum("structure",["DTIC","CHU-B","ACSI","DPM","PEV"]);
            $table->string("fonction",100);            
            $table->string("email",75)->unique()->nullable();
            $table->string("telephone",12)->unique();
            $table->date("date_creation")->default(Carbon::now());
            $table->timestamps();
        });

        /*
        *Si la table commandes a été crée avant la table produit
        */
        Schema::table("produits", function (Blueprint $table) {
            $table->unsignedBigInteger("prod_id")->index()->nullable();
            $table->foreign("prod_id")->references("id")->on("commandes")->onUpdate("cascade")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personnes');
    }
};
