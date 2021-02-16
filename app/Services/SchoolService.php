<?php

namespace App\Services;

use App\Models\School;

class SchoolService implements SchoolServiceInterface
{
    protected $news;

    public function __construct(School $news)
    {
        $this->news = $news;
    }

    /**
     * get list
     *
     * @return void
     */
    public function getListSchool($params)
    {
        $query = $this->news->orderByDesc('created_at')->paginate();
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
        $query = $this->news->orderByDesc('created_at');
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
        $this->news->create([
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
        $this->news->findOrFail($id)->delete();
    }

    /**
     * show
     *
     * @param $id
     * @return void
     */
    public function showSchool($id)
    {
        return $this->news->findOrFail($id)->getSchoolResponse();
    }

    /**
     * edit
     *
     * @param array $params
     * @return void
     */
    public function updateSchool($params)
    {
        $this->news->findOrFail($params['id'])->update($params);
    }
}
