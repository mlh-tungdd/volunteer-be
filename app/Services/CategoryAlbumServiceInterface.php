<?php

namespace App\Services;

interface CategoryAlbumServiceInterface
{
    public function getListCategoryAlbum($params);

    public function getAllCategoryAlbum($params);

    public function createCategoryAlbum($params);

    public function deleteCategoryAlbum($id);

    public function showCategoryAlbum($id);

    public function updateCategoryAlbum($params);
}
