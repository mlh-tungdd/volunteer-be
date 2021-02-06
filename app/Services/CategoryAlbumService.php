<?php

namespace App\Services;

use App\Models\CategoryAlbum;

class CategoryAlbumService implements CategoryAlbumServiceInterface
{
    protected $categoryAlbum;

    public function __construct(CategoryAlbum $categoryAlbum)
    {
        $this->categoryAlbum = $categoryAlbum;
    }

    /**
     * get list
     *
     * @return void
     */
    public function getListCategoryAlbum($params)
    {
        $query = $this->categoryAlbum->orderByDesc('created_at')->paginate();
        return [
            'data' => $query->map(function ($item) {
                return $item->getCategoryAlbumResponse();
            }),
            'per_page' => $query->perPage(),
            'total' => $query->total(),
            'current_page' => $query->currentPage(),
            'last_page' => $query->lastPage(),
        ];
    }

    /**
     * get all
     *
     * @return void
     */
    public function getAllCategoryAlbum($params)
    {
        $query = $this->categoryAlbum->orderByDesc('created_at');
        return $query->get()->map(function ($item) {
            return $item->getCategoryAlbumResponse();
        });
    }

    /**
     * create
     *
     * @param array $params
     * @return void
     */
    public function createCategoryAlbum($params)
    {
        $this->categoryAlbum->create([
            'title' => $params['title'],
        ]);
    }

    /**
     * delete
     *
     * @param $id
     * @return void
     */
    public function deleteCategoryAlbum($id)
    {
        $this->categoryAlbum->findOrFail($id)->delete();
    }

    /**
     * show
     *
     * @param $id
     * @return void
     */
    public function showCategoryAlbum($id)
    {
        return $this->categoryAlbum->findOrFail($id);
    }

    /**
     * edit
     *
     * @param array $params
     * @return void
     */
    public function updateCategoryAlbum($params)
    {
        $this->categoryAlbum->findOrFail($params['id'])->update($params);
    }
}
