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
        $data["seasons"] = $this->seasonModel->join('league_season', 'season.id = league_season.id_season',"inner")
        ->join('league', 'league_season.id_league = league.id',"inner")->select('league_season.id as season_id, league.id as league_id, league.name, league.level, season.start')
        ->orderBy("start", "DESC")->findall();
        return view('seasons/index', $data);
    }
    public function matches($id)
    {
        $data["game"] = $this->gameModel->where('id_league_season', $id)->findAll();
        return view('seasons/season_matches', $data);
    }
}
