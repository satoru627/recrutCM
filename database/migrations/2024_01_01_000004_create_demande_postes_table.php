<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('demande_postes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('poste_souhaite');
            $table->string('secteur');
            $table->string('ville');
            $table->text('competences');
            $table->string('disponibilite');
            $table->enum('type_contrat', ['CDI', 'CDD', 'Stage', 'Journalier', 'Freelance']);
            $table->decimal('salaire_souhaite', 10, 0)->nullable();
            $table->enum('statut', ['en_attente', 'accepte', 'refuse'])->default('en_attente');
            $table->text('reponse_admin')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('demande_postes'); }
};
