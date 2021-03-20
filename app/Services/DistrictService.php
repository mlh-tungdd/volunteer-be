<?php

namespace App\Services;

use App\Models\District;

class DistrictService implements DistrictServiceInterface
{
    protected $district;

    public function __construct(District $district)
    {
        $this->district = $district;
    }

    /**
     * get list
     *
     * @return void
     */
    public function getListDistrict($params)
    {
        $query = $this->district->orderByDesc('created_at')->paginate();
        return [
            'data' => $query->map(function ($item) {
                return $item->getDistrictResponse();
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
    public function getAllDistrict($params)
    {
        $query = $this->district->orderByDesc('created_at');
        return $query->get()->map(function ($item) {
            return $item->getDistrictResponse();
        });
    }

    /**
     * create
     *
     * @param array $params
     * @return void
     */
    public function createDistrict($params)
    {
        $this->district->create([
            'title' => $params['title'],
        ]);
    }

    /**
     * delete
     *
     * @param $id
     * @return void
     */
    public function deleteDistrict($id)
    {
        $this->district->findOrFail($id)->delete();
    }

    /**
     * show
     *
     * @param $id
     * @return void
     */
    public function showDistrict($id)
    {
        return $this->district->findOrFail($id);
    }

    /**
     * edit
     *
     * @param array $params
     * @return void
     */
    public function updateDistrict($params)
    {
        $this->district->findOrFail($params['id'])->update($params);
    }
}
