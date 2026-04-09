<?php
namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
    use Notifiable;
    protected $fillable = ['nom','prenom','email','telephone','ville','cv','role','password'];
    protected $hidden = ['password','remember_token'];
    protected $casts = ['password' => 'hashed'];

    public function isAdmin(): bool { return $this->role === 'admin'; }
    public function isClient(): bool { return $this->role === 'client'; }
    public function nomComplet(): string { return $this->prenom.' '.$this->nom; }
    public function candidatures() { return $this->hasMany(Candidature::class); }
    public function demandePostes() { return $this->hasMany(DemandePoste::class); }
    public function rendezvousClient() { return $this->hasMany(Rendezvous::class, 'client_id'); }
    public function offresPubliees() { return $this->hasMany(Offre::class, 'admin_id'); }
}
