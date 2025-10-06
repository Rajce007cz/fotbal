<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\NavigationModel;


/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var list<string>
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */

public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
{
    parent::initController($request, $response, $logger);

    $navModel = new \App\Models\NavigationModel();

    $isAdmin = session()->get('is_admin') === true;

    $visibleIn = ['frontend', 'both'];
    if ($isAdmin) {
        $visibleIn[] = 'admin';
    }

    $this->data['navLeft'] = $navModel
        ->whereIn('visible_in', $visibleIn)
        ->where('position', 'left')
        ->orderBy('order', 'ASC')
        ->findAll();

    // Základní pravé položky z DB
    $navRight = $navModel
        ->whereIn('visible_in', $visibleIn)
        ->where('position', 'right')
        ->orderBy('order', 'ASC')
        ->findAll();

    // Dynamicky přidat login/logout
    if ($isAdmin) {
        $navRight[] = [
            'title' => 'Odhlásit',
            'url'   => '/krajca/fotbal/logout',
        ];
    } else {
        $navRight[] = [
            'title' => 'Přihlásit',
            'url'   => '/krajca/fotbal/login',
        ];
    }

    $this->data['navRight'] = $navRight;
}
}
