<?php

namespace App\Services;

use App\Models\Event;

class EventService implements EventServiceInterface
{
    protected $event;

    public function __construct(Event $event)
    {
        $this->event = $event;
    }

    /**
     * get list
     *
     * @return void
     */
    public function getListEvent($params)
    {
        $query = $this->event->orderByDesc('created_at');
        $title = $params['title'] ?? null;

        if ($title != null) {
            $query->where('title', 'like', '%' . $title . '%');
        }

        $query = $query->paginate();

        return [
            'data' => $query->map(function ($item) {
                return $item->getEventResponse();
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
    public function getAllEvent($params)
    {
        $query = $this->event->orderByDesc('created_at');
        return $query->get()->map(function ($item) {
            return $item->getEventResponse();
        });
    }

    /**
     * create
     *
     * @param array $params
     * @return void
     */
    public function createEvent($params)
    {
        $this->event->create([
            'title' => $params['title'],
            'description' => $params['description'],
            'content' => $params['content'],
            'thumbnail' => $params['thumbnail'],
        ]);
    }

    /**
     * delete
     *
     * @param $id
     * @return void
     */
    public function deleteEvent($id)
    {
        $this->event->findOrFail($id)->delete();
    }

    /**
     * show
     *
     * @param $id
     * @return void
     */
    public function showEvent($id)
    {
        return $this->event->findOrFail($id)->getEventResponse();
    }

    /**
     * edit
     *
     * @param array $params
     * @return void
     */
    public function updateEvent($params)
    {
        $this->event->findOrFail($params['id'])->update($params);
    }
}
