<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ArticleModel;

class ArticleController extends BaseController
{
    private function adminOnly()
{
    if (!session()->get('is_admin')) {
        return redirect()->to('/login')->with('error', 'Přístup pouze pro administrátory.');
    }
}
public function adminIndex()
{
    if ($redirect = $this->adminOnly()) return $redirect;

    $articles = $this->articleModel->orderBy('date', 'DESC')->findAll();

    return view('admin/articles/index', array_merge($this->data, [
        'articles' => $articles
    ]));
}
    public function __construct()
    {
        $this->articleModel = new ArticleModel();
        if (!session()->get('is_admin')) {
        return redirect()->to('/login')->with('error', 'Přístup pouze pro administrátory.');
    }
    }

    public function index()
{
    // Nejnovější publikovaná dlaždice
    $mainTile = $this->articleModel->where('top', 1)
                      ->orderBy('date', 'DESC')
                      ->first();

    // Další 4 publikované dlaždice (mimo první)
    $secondaryTiles = $this->articleModel->where('top', 1)
                            ->orderBy('date', 'DESC')
                            ->findAll(5); // Načteme 5 celkem

    // Odstraň první z pole (je to ta hlavní)
    if ($mainTile && count($secondaryTiles) > 0 && $secondaryTiles[0]['id'] === $mainTile['id']) {
        array_shift($secondaryTiles);
    }

    // Přidej formátované datum k hlavní dlaždici
    if ($mainTile) {
        $mainTile['formattedDate'] = date('j. n. Y', $mainTile['date']);
    }

    // Přidej formátované datum ke všem sekundárním dlaždicím
    foreach ($secondaryTiles as &$tile) {
        $tile['formattedDate'] = date('j. n. Y', $tile['date']);
    }
    unset($tile); // odstraníme referenci

    $data = [
        'mainTile' => $mainTile,
        'secondaryTiles' => $secondaryTiles
    ];

    return view('index', array_merge($this->data, $data));
}
    public function article($id)
{
    $data["article"] = $this->articleModel->where('id', $id)->first();

    return view('article', array_merge($this->data, $data));
}
public function create()
{
    if ($redirect = $this->adminOnly()) return $redirect;

    return view('admin/articles/create', $this->data);
}
protected $allowedFields = ['title', 'content', 'date', 'top'];

public function store()
{
    if ($redirect = $this->adminOnly()) return $redirect;

    $data = $this->request->getPost();

    $this->articleModel->insert([
        'title'   => $data['title'],
        'content' => $data['content'],
        'date'    => strtotime($data['date']),
        'top'     => isset($data['top']) ? 1 : 0
    ]);

    return redirect()->to('/admin/articles')->with('success', 'Článek byl vytvořen.');
}
public function edit($id)
{
    if ($redirect = $this->adminOnly()) return $redirect;

    $article = $this->articleModel->find($id);

    return view('admin/articles/edit', array_merge($this->data, [
        'article' => $article
    ]));
}
public function update($id)
{
    if ($redirect = $this->adminOnly()) return $redirect;

    $data = $this->request->getPost();

    $this->articleModel->update($id, [
        'title'   => $data['title'],
        'content' => $data['content'],
        'date'    => strtotime($data['date']),
        'top'     => isset($data['top']) ? 1 : 0
    ]);

    return redirect()->to('/admin/articles')->with('success', 'Článek byl aktualizován.');
}
public function delete($id)
{
    if ($redirect = $this->adminOnly()) return $redirect;

    $this->articleModel->delete($id);

    return redirect()->to('/admin/articles')->with('success', 'Článek byl smazán.');
}

}