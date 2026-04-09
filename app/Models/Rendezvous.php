<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Rendezvous extends Model {
    protected $table = 'rendezvous'; 
    protected $fillable = ['candidature_id','admin_id','client_id','date_heure','lieu','notes','statut'];
    protected $casts = ['date_heure' => 'datetime'];
    public function candidature() { return $this->belongsTo(Candidature::class); }
    public function admin() { return $this->belongsTo(User::class, 'admin_id'); }
    public function client() { return $this->belongsTo(User::class, 'client_id'); }
}
