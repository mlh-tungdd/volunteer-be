<?php

namespace App\Services;

use App\Models\Donation;
use JWTAuth;

class DonationService implements DonationServiceInterface
{
    protected $donation;

    public function __construct(Donation $donation)
    {
        $this->donation = $donation;
    }

    /**
     * get list
     *
     * @return void
     */
    public function getListDonation($params)
    {
        $query = $this->donation->orderByDesc('created_at');
        $status = $params['status'] ?? null;

        if ($status != null) {
            $query->where('status', $status);
        }

        $query = $query->paginate();
        return [
            'data' => $query->map(function ($item) {
                return $item->getDonationResponse();
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
    public function getAllDonation($params)
    {
        $query = $this->donation->orderByDesc('created_at');
        return $query->get()->map(function ($item) {
            return $item->getDonationResponse();
        });
    }

    /**
     * create
     *
     * @param array $params
     * @return void
     */
    public function createDonation($params)
    {
        $this->donation->create([
            'title' => $params['title'],
            'description' => $params['description'],
            'content' => $params['content'],
            'status' => $params['status'],
            'tags' => $params['tags'],
            'user_id' => JWTAuth::user()->id,
        ]);
    }

    /**
     * delete
     *
     * @param $id
     * @return void
     */
    public function deleteDonation($id)
    {
        $this->donation->findOrFail($id)->delete();
    }

    /**
     * show
     *
     * @param $id
     * @return void
     */
    public function showDonation($id)
    {
        return $this->donation->findOrFail($id)->getDonationResponse();
    }

    /**
     * edit
     *
     * @param array $params
     * @return void
     */
    public function updateDonation($params)
    {
        $this->donation->findOrFail($params['id'])->update($params);
    }
}
