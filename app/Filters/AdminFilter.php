<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AdminFilter implements FilterInterface
{
    /**
     * Spustí se před zpracováním požadavku.
     * Kontroluje, jestli je uživatel admin.
     * 
     * @param RequestInterface $request
     * @param array|null $arguments
     * @return ResponseInterface|null
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        if (!$session->get('is_admin')) {
            // Není admin -> přesměruj na login s chybovou hláškou
            return redirect()->to('/login')->with('error', 'Přístup pouze pro administrátory.');
        }
    }

    /**
     * Spustí se po zpracování požadavku.
     * Tady není potřeba nic dělat.
     * 
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @param array|null $arguments
     * @return void
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Nepotřebujeme nic po zpracování
    }
}