<?php


// Protected ModelName fait appel au model avec lequel on interagit
namespace Controllers;

class Recrue extends Controller
{
    protected $modelName = \Models\Recrue::class;

    public function index()
    {
        //1. Récupération des articles

        $recrues = $this->model->findAll();

        /*
     2. Affichage
*/
        \Renderer::render('articles/index', compact('recrues')); //compile et envoie les variables pagetitle articles et lisesarticle dans la page index
    }

    public function insertNewRecuit()
    {

        $nom = null;
        if (!empty($_POST['nom'])) {
            $nom = $_POST['nom'];
        }

        $grade = null;
        if (!empty($_POST['grade'])) {
            $grade = $_POST['grade'];
        }

        if (!$nom || !$grade) {
            die("Certains champ de votre article ont été mal rempli !");
        }

        $this->model->insertRecrue($nom, $grade);

        \Http::redirect("index.php");
    }
}
