<?php

namespace App\Models;
use CodeIgniter\Model;

class NavigationModel extends Model
{
    protected $table = 'navigation';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'url', 'position', 'visible_in', 'order'];
}