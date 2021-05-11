<?php

namespace App\Services;

use App\Models\Video;

class VideoService implements VideoServiceInterface
{
    protected $video;

    public function __construct(Video $video)
    {
        $this->video = $video;
    }

    /**
     * get list
     *
     * @return void
     */
    public function getListVideo($params)
    {
        $query = $this->video->orderByDesc('created_at');
        $title = $params['title'] ?? null;

        if ($title != null) {
            $query->where('title', 'like', '%' . $title . '%');
        }

        $query = $query->paginate();

        return [
            'data' => $query->map(function ($item) {
                return $item->getVideoResponse();
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
    public function getAllVideo($params)
    {
        $query = $this->video->orderByDesc('created_at');
        return $query->get()->map(function ($item) {
            return $item->getVideoResponse();
        });
    }

    /**
     * create
     *
     * @param array $params
     * @return void
     */
    public function createVideo($params)
    {
        $this->video->create([
            'title' => $params['title'],
            'url' => $params['url'],
            'thumbnail' => $params['thumbnail'],
        ]);
    }

    /**
     * delete
     *
     * @param $id
     * @return void
     */
    public function deleteVideo($id)
    {
        $this->video->findOrFail($id)->delete();
    }

    /**
     * show
     *
     * @param $id
     * @return void
     */
    public function showVideo($id)
    {
        return $this->video->findOrFail($id);
    }

    /**
     * edit
     *
     * @param array $params
     * @return void
     */
    public function updateVideo($params)
    {
        $this->video->findOrFail($params['id'])->update($params);
    }
}
