<?php
namespace Database\Seeders;
use App\Models\User;
use App\Models\Offre;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder {
    public function run(): void {
        $admin = User::create([
            'nom'=>'Admin','prenom'=>'RecrutCM','email'=>'admin@recrutcm.cm',
            'telephone'=>'+237 699 000 000','ville'=>'Yaounde','role'=>'admin',
            'password'=>Hash::make('admin123'),
        ]);
        User::create([
            'nom'=>'Kamga','prenom'=>'Jean-Pierre','email'=>'client@recrutcm.cm',
            'telephone'=>'+237 677 123 456','ville'=>'Douala','role'=>'client',
            'password'=>Hash::make('client123'),
        ]);
        $offres = [
            ['titre'=>'Developpeur Web PHP/Laravel','description'=>'Nous recherchons un developpeur web experimente maitrisant PHP et Laravel. Vous serez charge du developpement et de la maintenance de nos applications web. Bonne connaissance de MySQL requise.','ville'=>'Yaounde','secteur'=>'Informatique','type_contrat'=>'CDI','salaire_min'=>250000,'salaire_max'=>400000,'entreprise'=>'TechCam Solutions','date_limite'=>now()->addMonths(2)],
            ['titre'=>'Conducteur de travaux BTP','description'=>'Entreprise de construction recrute un conducteur de travaux pour supervision de chantiers. Experience de 3 ans minimum dans le BTP. Permis de conduire B exige.','ville'=>'Douala','secteur'=>'BTP','type_contrat'=>'CDI','salaire_min'=>300000,'salaire_max'=>500000,'entreprise'=>'CAMCON Batiment','date_limite'=>now()->addMonths(1)],
            ['titre'=>'Infirmier(ere) diplome(e)','description'=>'Clinique moderne recrute un(e) infirmier(ere) diplome(e) d\'Etat. Horaires en rotation. Hebergement possible. Experience en soins intensifs appreciee.','ville'=>'Bafoussam','secteur'=>'Sante','type_contrat'=>'CDI','salaire_min'=>180000,'salaire_max'=>280000,'entreprise'=>'Clinique Sainte-Marie','date_limite'=>now()->addMonths(3)],
            ['titre'=>'Commercial terrain','description'=>'Societe de distribution FMCG recherche des commerciaux dynamiques pour couvrir les zones de Douala. Vehicule de service fourni. Commission attractive sur ventes.','ville'=>'Douala','secteur'=>'Commerce','type_contrat'=>'CDI','salaire_min'=>120000,'salaire_max'=>250000,'entreprise'=>'DistriboCam','date_limite'=>now()->addMonths(2)],
            ['titre'=>'Stagiaire Comptabilite','description'=>'Cabinet comptable offre un stage de fin d\'etudes en comptabilite et gestion. Formation assuree. Possibilite d\'embauche apres le stage.','ville'=>'Yaounde','secteur'=>'Finance','type_contrat'=>'Stage','salaire_min'=>50000,'salaire_max'=>80000,'entreprise'=>'Cabinet Expertise CM','date_limite'=>now()->addMonths(1)],
            ['titre'=>'Enseignant(e) Mathematiques','description'=>'Lycee prive recrute un enseignant de mathematiques pour classes de terminale. DIPES II exige. Logement de fonction disponible.','ville'=>'Garoua','secteur'=>'Education','type_contrat'=>'CDD','salaire_min'=>150000,'salaire_max'=>220000,'entreprise'=>'College Excellence Nord','date_limite'=>now()->addMonths(2)],
        ];
        foreach ($offres as $o) Offre::create([...$o,'admin_id'=>$admin->id,'active'=>true]);
    }
}
