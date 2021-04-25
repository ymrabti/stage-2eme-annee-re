<?php

namespace App\Models;
use CodeIgniter\Model;
class LingenieurModel extends Model{
    public function getSelectFields(){
        $model = new Lingenieur();
        $types = new TypesModel();
        $typesdiplomes = new TypesDiplomesModel();
        $accesecoles = new AccesEcoleModel();
        $domaines = new DomainesModel();
        $villes = new VillesModel();
        $ecoles = new EcolesModel();
        $formations = new FormationsModel();
        return [
            'types'  => $types->getTypes(),
            // 'types'  => $model->getData('types'),
            'diplomes'  => $typesdiplomes->getTypesDiplomes(),
            'accesecoles' => $accesecoles->getAdmissions(),
            'domaines' => $domaines->getDomaines(),
            'villes' => $villes -> getVilles(),
            'ecoles' => $ecoles->findAll(),
            'formations' => $formations->findAll()
        ];
    }
}

class Lingenieur extends Model{
    public function getData($tablename)
    {
        $table = $tablename;
        return $this->findAll();
    }

}

class VillesModel extends Model
{
    protected $table = "villes";
    public function getVilles()
    {
        return $this->findAll();
    }
}
class DomainesModel extends Model
{
    protected $table = "dformations";
    public function getDomaines()
    {
        return $this->findAll();
    }
}

class EcolesModel extends Model{
    protected $table = 'ecoles';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    /* protected $allowedFields = [
        'id', 'nom', 'ville', 'typeEtablissement', 'adresse',
        'tel', 'fax', 'siteweb' , 'infos', 'lambda', 'phi', 'img'
    ]; */
    
}


class FormationsModel extends Model{
    protected $table = 'formations';
    protected $returnType     = 'array';
}
class TypesModel extends Model{
    protected $table = "types";
    public function getTypes()
    {
        return $this->findAll();
    }
}
class TypesDiplomesModel extends Model{
    protected $table = "typesdiplomes";
    public function getTypesDiplomes()
    {
        return $this->findAll();
    }
}
class AccesEcoleModel extends Model{
    protected $table = "admission";
    public function getAdmissions()
    {
        return $this->findAll();
    }
}

?>