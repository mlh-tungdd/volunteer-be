<?php

namespace App\Services;

use App\Models\School;
use App\Models\District;

class SchoolService implements SchoolServiceInterface
{
    protected $school;
    protected $district;

    public function __construct(School $school, District $district)
    {
        $this->school = $school;
        $this->district = $district;
    }

    /**
     * get list
     *
     * @return void
     */
    public function getListSchool($params)
    {
        $query = $this->school->orderByDesc('created_at')->paginate();
        return [
            'data' => $query->map(function ($item) {
                return $item->getSchoolResponse();
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
    public function getAllSchool($params)
    {
        $query = $this->school->orderByDesc('created_at');
        return $query->get()->map(function ($item) {
            return $item->getSchoolResponse();
        });
    }

    /**
     * create
     *
     * @param array $params
     * @return void
     */
    public function createSchool($params)
    {
        $this->school->create([
            'title' => $params['title'],
            'description' => $params['description'],
            'content' => $params['content'],
            'address' => $params['address'],
        ]);
    }

    /**
     * delete
     *
     * @param $id
     * @return void
     */
    public function deleteSchool($id)
    {
        $this->school->findOrFail($id)->delete();
    }

    /**
     * show
     *
     * @param $id
     * @return void
     */
    public function showSchool($id)
    {
        return $this->school->findOrFail($id)->getSchoolResponse();
    }

    /**
     * edit
     *
     * @param array $params
     * @return void
     */
    public function updateSchool($params)
    {
        $this->school->findOrFail($params['id'])->update($params);
    }

    /**
     * get list by district_id
     *
     * @return void
     */
    public function getListSchoolByDistrictId($districtId)
    {
        $query = $this->school->with(['districts'])->where('district_id', $districtId)->orderByDesc('created_at')->paginate();
        return [
            'data' => $query->map(function ($item) {
                return $item->getSchoolResponse();
            }),
            'per_page' => $query->perPage(),
            'total' => $query->total(),
            'current_page' => $query->currentPage(),
            'last_page' => $query->lastPage(),
            'district' => $this->district->findOrFail($districtId)
        ];
    }
}
