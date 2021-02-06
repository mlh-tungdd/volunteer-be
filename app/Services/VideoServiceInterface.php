<?php

namespace App\Services;

interface VideoServiceInterface
{
    public function getListVideo($params);

    public function getAllVideo($params);

    public function createVideo($params);

    public function deleteVideo($id);

    public function showVideo($id);

    public function updateVideo($params);
}
