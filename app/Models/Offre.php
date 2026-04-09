<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Offre extends Model {
    protected $fillable = ['titre','description','ville','secteur','type_contrat','salaire_min','salaire_max','entreprise','date_limite','active','admin_id'];
    protected $casts = ['date_limite' => 'date', 'active' => 'boolean'];

    public function scopeActive($q) { return $q->where('active', true)->where('date_limite', '>=', now()); }
    public function scopeParVille($q, $v) { return $v ? $q->where('ville', $v) : $q; }
    public function scopeParSecteur($q, $s) { return $s ? $q->where('secteur', $s) : $q; }
    public function scopeParContrat($q, $c) { return $c ? $q->where('type_contrat', $c) : $q; }

    public function salaireFormate(): string {
        if ($this->salaire_min && $this->salaire_max)
            return number_format($this->salaire_min,0,',',' ').' – '.number_format($this->salaire_max,0,',',' ').' FCFA';
        if ($this->salaire_min)
            return 'À partir de '.number_format($this->salaire_min,0,',',' ').' FCFA';
        return 'Salaire à négocier';
    }
    public function estExpiree(): bool { return $this->date_limite->isPast(); }
    public function admin() { return $this->belongsTo(User::class, 'admin_id'); }
    public function candidatures() { return $this->hasMany(Candidature::class); }
}
