<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('offres', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('description');
            $table->string('ville');
            $table->string('secteur');
            $table->enum('type_contrat', ['CDI', 'CDD', 'Stage', 'Journalier', 'Freelance']);
            $table->decimal('salaire_min', 10, 0)->nullable();
            $table->decimal('salaire_max', 10, 0)->nullable();
            $table->string('entreprise');
            $table->date('date_limite');
            $table->boolean('active')->default(true);
            $table->foreignId('admin_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('offres'); }
};
