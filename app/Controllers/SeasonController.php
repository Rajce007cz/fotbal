<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\SeasonModel;

class SeasonController extends BaseController
{
    public function __construct()
    {
        $this->seasonModel = new SeasonModel();
    }

    public function index()
    {
        $data["seasons"] = $this->seasonModel->join('league_season', 'season.id = league_season.id_season',"inner")
        ->join('league', 'league_season.id_league = league.id',"inner")
        ->orderBy("start", "DESC")->findall();
        return view('seasons/index', $data);
    }
}
