<?php

namespace App\Services;

interface DonationServiceInterface
{
    public function getListDonationByUser();

    public function getListDonation($params);

    public function getAllDonation($params);

    public function createDonation($params);

    public function deleteDonation($id);

    public function showDonation($id);

    public function updateDonation($params);
}
