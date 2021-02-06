<?php

namespace App\Services;

interface SchoolServiceInterface
{
    public function getListSchool($params);

    public function getAllSchool($params);

    public function createSchool($params);

    public function deleteSchool($id);

    public function showSchool($id);

    public function updateSchool($params);
}
