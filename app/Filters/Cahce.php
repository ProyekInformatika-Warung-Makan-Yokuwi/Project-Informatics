<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Cache implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Tidak ada aksi sebelum request diproses
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tambahkan header cache agar file static tersimpan di browser
        $response->setHeader('Cache-Control', 'public, max-age=604800, immutable');
        $response->setHeader('Pragma', 'public');
        $response->setHeader('Expires', gmdate('D, d M Y H:i:s', time() + 604800) . ' GMT');
    }
}
