<?php

namespace App\Controllers;

use App\Models\EcolesModel;
use App\Models\FormationsModel;
use App\Models\LingenieurModel;
use App\Models\VillesModel;
use CodeIgniter\Controller;

class Home extends Controller
{
    public function index()
    {
        $model = new LingenieurModel();
        $data_head = [
            "title" => "Recherche Multicritère"
        ];
        $data = $model->getSelectFields();
        echo view('lingenie_wp/header', $data_head);
        echo view('lingenie_wp/searchform', $data);
        echo view('lingenie_wp/footer');
    }
    public function ecoles()
    {
        $ecoles = new LingenieurModel();
        $ecoles = new EcolesModel();
        $where = [];
        if (isset($_GET['typeEtablissement']) && $_GET['typeEtablissement'] != 1) {
            $where['typeEtablissement'] = $_GET['typeEtablissement'];
        }
        if (isset($_GET['typeDiplome']) && $_GET['typeDiplome'] != 1) {
            $where['typediplome'] = $_GET['typeDiplome'];
        }
        if (isset($_GET['domaineFormation']) && $_GET['domaineFormation'] != 1) {
            $where['idforma'] = $_GET['domaineFormation'];
        }
        if (isset($_GET['acces-ecole']) && $_GET['acces-ecole'] != 1) {
            $where['idadmis'] = $_GET['acces-ecole'];
        }
        if (isset($_GET['ville-ecole']) && $_GET['ville-ecole'] != 1) {
            $where['ville'] = $_GET['ville-ecole'];
        }
        $decoles = $ecoles
            ->select('img,idecole,infos,siteweb,nom,chemin')
            ->distinct()
            ->join('images', 'ecoles.img = images.img_id')
            ->join('admecoles', 'ecoles.id = idecole')
            ->join('dformecoless', 'ecoles.id = idecole1')
            ->join('diplomationecoles', 'ecoles.id = ecole')
            ->where($where)->paginate(5);

        $data     = [
            "ecoles" => $decoles,
            'pager' => $ecoles->pager
        ];

        $data_head = [
            "title" => "Ecoles (" . $ecoles->countAllResults() . ") - Resultat de la recherche"
        ];
        echo view('lingenie_wp/header', $data_head);
        echo view('lingenie_wp/ecoles', $data);
        echo view('lingenie_wp/footer');
    }
    public function infos_ecole($ecole_id)
    {
        $db = \Config\Database::connect();
        $ecole_inf = $db->table('ecoles')
            ->select('chemin,ecoles.nom as nomecole,ecoles.id as id_ecole,
            ecoles.siteweb,types.nom as nomtype,villes.nom as vil,
            adresse,tel,fax,infos,lambda,phi')
            ->join('images', 'ecoles.img = images.img_id')
            ->join('types',  'ecoles.typeEtablissement=types.id')
            ->join('villes', 'ecoles.ville=villes.id')
            ->where('ecoles.id', $ecole_id)
            ->get()
            ->getRowArray();
        // ->getResultArray();
        if (!is_null($ecole_inf)) {
            $adm_ecoles = $db->table('admecoles')
                ->select('nom')
                ->join('admission', 'idadmis=admission.id')
                ->where('idecole', $ecole_id)
                ->get()
                ->getResultArray();

            $frm_ecoles = $db->table('dformecoless')
                ->select('nom')
                ->join('dformations', 'idforma=dformations.id')
                ->where('idecole1', $ecole_id)
                ->get()
                ->getResultArray();


            $formations_ecole = $db->table('formations')
                ->select('id,intitule')
                ->where('ecoleoffert', $ecole_id)
                ->get()
                ->getResultArray();

            $data = [
                "ecole" => $ecole_inf,
                "admission" => $adm_ecoles,
                "domaines" => $frm_ecoles,
                "formations" => $formations_ecole
            ];
            $data_head = [
                "title" => $ecole_inf["nomecole"],
                'ico' => $ecole_inf["chemin"],
                "should_map" => true
            ];
            $E = $ecole_inf['lambda'];
            $N = $ecole_inf['phi'];
            $nom = $ecole_inf['nomecole'];
            echo view('lingenie_wp/header', $data_head);
            echo view('lingenie_wp/ecole-infos', $data);
            echo view('lingenie_wp/map-script', ["E" => $E, "N" => $N, "nom" => $nom]);
        } else {
            $data_head = [
                "title" => "Not found"
            ];
            echo view('lingenie_wp/header', $data_head);
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Ecole ' . $ecole_id . ' Not Found');
        }
        echo view('lingenie_wp/footer');
    }
    public function formations()
    {
        $formations = new LingenieurModel();
        $formations = new FormationsModel();
        $where = [];
        if (isset($_GET['typeFormation']) && $_GET['typeFormation'] != 1) {
            $where['typeformation'] = $_GET['typeFormation'];
        }
        if (isset($_GET['typeDiplomeff']) && $_GET['typeDiplomeff'] != 1) {
            $where['typediplome'] = $_GET['typeDiplomeff'];
        }
        if (isset($_GET['acces-formation']) && $_GET['acces-formation'] != 1) {
            $where['admisformation'] = $_GET['acces-formation'];
        }
        if (isset($_GET['domaineFormationff']) && $_GET['domaineFormationff'] != 1) {
            $where['domaineformation'] = $_GET['domaineFormationff'];
        }
        if (isset($_GET['ville-formation']) && $_GET['ville-formation'] != 1) {
            $where['ville'] = $_GET['ville-formation'];
        }
        $dformations = $formations
            ->select('formations.infos,lien,intitule,ecoleoffert,formations.id,nom,images.chemin as chemin')
            ->distinct()
            ->join('images', 'formations.img = images.img_id')
            ->join('ecoles', 'ecoleoffert=ecoles.id')
            ->where($where)->paginate(5);

        $data     = [
            "formations" => $dformations,
            'pager' => $formations->pager
        ];

        $data_head = [
            "title" => "Formations"
        ];
        echo view('lingenie_wp/header', $data_head);
        echo view('lingenie_wp/formations', $data);
    }

    public function infos_formation($formation_id)
    {
        $db = db_connect();
        $formaation_inf = $db->table('formations')
            ->select('lambda,phi,chemin,formations.*,
            admission.nom as nomadmission,
            dformations.nom as nomformation,ecoles.nom as nomecole,types.nom 
            as nomtype,typesdiplomes.nom as diplome,villes.nom as city ')
            ->join('images', 'formations.img=images.img_id ')
            ->join('admission', 'admisformation=admission.id ')
            ->join('dformations', 'domaineformation=dformations.id ')
            ->join('ecoles', 'ecoleoffert=ecoles.id ')
            ->join('typesdiplomes', 'typediplome=typesdiplomes.id ')
            ->join('types',  'typeformation=types.id ')
            ->join('villes', 'ecoles.ville=villes.id ')
            ->where('formations.id', $formation_id)
            ->get()
            ->getRowArray();
        if (!is_null($formaation_inf)) {


            $data = [
                "formation" => $formaation_inf
            ];
            $data_head = [
                "title" => $formaation_inf["nomecole"],
                'ico' => $formaation_inf["chemin"],
                "should_map" => true
            ];
            $E = $formaation_inf['lambda'];
            $N = $formaation_inf['phi'];
            $intitule = $formaation_inf['intitule'];
            echo view('lingenie_wp/header', $data_head);
            echo view('lingenie_wp/formation-infos', $data);
            echo view('lingenie_wp/map-script', ["E" => $E, "N" => $N, "nom" => $intitule]);
        } else {
            $data_head = [
                "title" => "Not found"
            ];
            echo view('lingenie_wp/header', $data_head);
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Formation ' . $formation_id . ' Not Found');
        }
        echo view('lingenie_wp/footer');
    }

    public function welcome($message = "Hello")
    {
        $ecoles = new LingenieurModel();
        $ecoles = new EcolesModel();
        $data     = [
            "title" => "Resultat de la recherche",
            "heading" => "Count : " . $ecoles->countAllResults(),
            "ecoles" => $ecoles->join('images', 'ecoles.img = images.img_id')
                ->get()->getResultArray(),
            'pager' => $ecoles->pager
        ];
        $parser = \Config\Services::parser();
        echo $parser->setData($data)
            ->render('welcome');
    }
    public function api()
    {
        /* $database = \Config\Database::connect();
        $arra = $database->table('ecoles')->get()->getResultArray();
        echo json_encode($arra); */
        return redirect()->to('/');
    }
}
