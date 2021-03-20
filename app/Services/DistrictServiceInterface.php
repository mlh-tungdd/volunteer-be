<?php

namespace App\Services;

interface DistrictServiceInterface
{
    public function getListDistrict($params);

    public function getAllDistrict($params);

    public function createDistrict($params);

    public function deleteDistrict($id);

    public function showDistrict($id);

    public function updateDistrict($params);
}
