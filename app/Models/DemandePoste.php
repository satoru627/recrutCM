<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class DemandePoste extends Model {
    protected $fillable = ['user_id','poste_souhaite','secteur','ville','competences','disponibilite','type_contrat','salaire_souhaite','statut','reponse_admin'];
    public function user() { return $this->belongsTo(User::class); }
}
