<?php
namespace App\Models;
use CodeIgniter\Model;
class NewsModel extends Model
{
    protected $table = 'news';
    protected $allowedFields = ['title', 'slug', 'body'];
    protected $primaryKey = 'slug';
    protected $validationRules    = [
        'title' => 'required|min_length[3]|max_length[255]|is_unique[news.title]',
        'body'  => 'required',
    ];
    protected $validationMessages = [
        'title'        => [
            'is_unique' => 'Sorry. That title has already been taken. Porfavor choose another.'
        ]
    ];
    public function getNews($slug = false)
    {
        if ($slug === false) {
            return $this->findAll();
        }
        return $this->asArray()
            ->where(['slug' => $slug])
            ->first();
    }
}
?>