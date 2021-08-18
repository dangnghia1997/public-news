<?php

namespace App\Repositories;

use App\Models\Page;
use App\Repositories\Contracts\PageRepositoryInterface;
use Czim\Repository\BaseRepository;

class PageRepository extends BaseRepository implements PageRepositoryInterface
{
    /**
     * Returns specified model class name.
     *
     * @return string
     */
    public function model()
    {
        return Page::class;
    }
}
