<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Candidature extends Model {
    protected $fillable = ['user_id','offre_id','lettre_motivation','cv','statut','message_admin'];
    public function user() { return $this->belongsTo(User::class); }
    public function offre() { return $this->belongsTo(Offre::class); }
    public function rendezvous() { return $this->hasOne(Rendezvous::class); }
    public function badgeStatut(): string {
        return match($this->statut) {
            'accepte' => '<span class="badge badge-success">Accepte</span>',
            'refuse'  => '<span class="badge badge-danger">Refuse</span>',
            default   => '<span class="badge badge-warning">En attente</span>',
        };
    }
}
