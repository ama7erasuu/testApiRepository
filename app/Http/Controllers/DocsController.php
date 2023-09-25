<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DocsController extends Controller
{
    /**
     * @param string $version
     * @return View
     */
    public function index(string $version): View
    {
        return view('docs', compact('version'));
    }

    /**
     * @param string $version
     * @return Response
     */
    public function getDocsFile(string $version): Response
    {
        $yaml = file_get_contents(base_path("docs/api/$version.yaml"));
        if (!$yaml) {
            throw new NotFoundHttpException();
        }
        return new Response($yaml, 200, ['Content-Type' => 'text/yaml']);
    }
}
