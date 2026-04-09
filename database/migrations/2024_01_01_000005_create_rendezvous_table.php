<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('rendezvous', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidature_id')->constrained()->onDelete('cascade');
            $table->foreignId('admin_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('client_id')->constrained('users')->onDelete('cascade');
            $table->dateTime('date_heure');
            $table->string('lieu');
            $table->text('notes')->nullable();
            $table->enum('statut', ['planifie', 'confirme', 'reporte', 'annule'])->default('planifie');
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('rendezvous'); }
};
