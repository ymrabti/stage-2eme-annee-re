<?php

namespace App\Controllers;

use App\Models\NewsModel;
use CodeIgniter\Controller;

class News extends Controller
{
    public function index()
    {
        $model = new NewsModel();

        $data = [
            'news'  => $model->getNews(),
            'title' => 'News archive',
        ];

        echo view('templates/header', $data);
        echo view('news/overview', $data);
        echo view('templates/footer', $data);
    }

    public function view($slug = null)
    {
        $model = new NewsModel();

        $data['news'] = $model->getNews($slug);
        // php spark serve
        if (empty($data['news'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the news item: ' . $slug);
        }

        $data['title'] = $data['news']['title'];
        

        echo view('templates/header', $data);
        echo view('news/view', $data);
        echo view('templates/footer', $data);
    }
    public function create()
    {
        $model = new NewsModel();

        if ($this->request->getMethod() === 'post') {
            $title = $_POST['title'];
            $bodyy = $_POST['body'];
            $newitem = [
                'title' => $title,
                'slug'  => trim(url_title($title, '-', TRUE)),
                'body'  => $bodyy,
            ];
            if ($model->insert($newitem) === true) {
                $data["title"] = $title;
                echo view('templates/header', ['title' => 'succesfully inserted!']);
                echo view('news/success',$data);
            }else {
                echo view('templates/header', [
                    'title' => 'Create a news item',
                    'errors' => $model->errors()
                ]);
                echo view('news/create');
            }
        } else {
            echo view('templates/header', ['title' => 'Create a news item']);
            echo view('news/create');
        }
        echo view('templates/footer');
    }
}
?>
