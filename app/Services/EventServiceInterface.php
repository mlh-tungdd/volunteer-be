<?php

namespace App\Services;

interface EventServiceInterface
{
    public function getListEvent($params);

    public function getAllEvent($params);

    public function createEvent($params);

    public function deleteEvent($id);

    public function showEvent($id);

    public function updateEvent($params);
}
