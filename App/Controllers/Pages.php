<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Pages extends Controller
{
    public function index()
    {
        $data["name"] = ucfirst("Younes !");
        return view('welcome',$data);
    }
    
    public function route($page = 'home')
    {
        if (!is_file(APPPATH . '/Views/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        echo view('templates/header', $data);
        echo view($page, $data);
        echo view('templates/footer', $data);
    }
}
