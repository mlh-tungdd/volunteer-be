<?php

namespace App\Services;

use App\Models\News;

class NewsService implements NewsServiceInterface
{
    protected $news;

    public function __construct(News $news)
    {
        $this->news = $news;
    }

    /**
     * get list
     *
     * @return void
     */
    public function getListNews($params)
    {
        $query = $this->news->with(['categoryNews'])->orderByDesc('created_at')->paginate();
        return [
            'data' => $query->map(function ($item) {
                return $item->getNewsResponse();
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
    public function getAllNews($params)
    {
        $query = $this->news->orderByDesc('created_at');
        return $query->get()->map(function ($item) {
            return $item->getNewsResponse();
        });
    }

    /**
     * create
     *
     * @param array $params
     * @return void
     */
    public function createNews($params)
    {
        $this->news->create([
            'title' => $params['title'],
            'description' => $params['description'],
            'content' => $params['content'],
            'author' => $params['author'],
            'source' => $params['source'],
            'category_id' => $params['category_id'],
            'thumbnail' => $params['thumbnail'],
        ]);
    }

    /**
     * delete
     *
     * @param $id
     * @return void
     */
    public function deleteNews($id)
    {
        $this->news->findOrFail($id)->delete();
    }

    /**
     * show
     *
     * @param $id
     * @return void
     */
    public function showNews($id)
    {
        return $this->news->findOrFail($id);
    }

    /**
     * edit
     *
     * @param array $params
     * @return void
     */
    public function updateNews($params)
    {
        $this->news->findOrFail($params['id'])->update($params);
    }
}
