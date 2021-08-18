<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\PageRepositoryInterface;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * @var PageRepositoryInterface
     */
    protected $pageRepository;

    public function __construct(PageRepositoryInterface $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }

    /**
     * @param Request $request
     * @param string $id
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request, $id)
    {
        $pages = $this->pageRepository->all();
        return view('pages.index', ['pages' => $pages]);
    }
}
