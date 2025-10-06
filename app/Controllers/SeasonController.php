<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\SeasonModel;
use App\Models\GameModel;

class SeasonController extends BaseController
{
    public function __construct()
    {
        $this->seasonModel = new SeasonModel();
        $this->gameModel = new GameModel();
    }

    public function index()
{
    $data["seasons"] = $this->seasonModel
        ->join('league_season', 'season.id = league_season.id_season', "inner")
        ->join('league', 'league_season.id_league = league.id', "inner")
        ->select('league_season.id as season_id, league.id as league_id, league.name, league.level, season.start, season.finish')
        ->orderBy("level", "ASC")
        ->findAll();

    // Sloučení dat z BaseControlleru ($this->data) a aktuálních ($data)
    $viewData = array_merge($this->data, $data);

    return view('seasons/index', $viewData);}
    public function matches($id)
{
    $db = \Config\Database::connect();

    $builder = $db->table('game m');
    $builder->select('m.id, m.round, 
                      m.goals_home, m.goals_away,
                      home.name as home_name,
                      away.name as away_name');
    $builder->join('team as home', 'm.home = home.id');
    $builder->join('team as away', 'm.away = away.id');
    $builder->where('m.id_league_season', $id);
    $builder->orderBy('m.round', 'DESC');

    $query = $builder->get();
    $matches = $query->getResultArray();

    return view('seasons/season_matches', ['matches' => $matches]);
}
public function match($id)
{
    $db = \Config\Database::connect();

    $builder = $db->table('game g');
    $builder->select('g.*, 
                      home.name as home_name, home.logo as home_logo,
                      away.name as away_name, away.logo as away_logo');
    $builder->join('team as home', 'g.home = home.id');
    $builder->join('team as away', 'g.away = away.id');
    $builder->where('g.id', $id);

    $match = $builder->get()->getRowArray();

    if (!$match) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Zápas s ID $id nenalezen.");
    }

    return view('seasons/match', ['match' => $match]);
}

}
