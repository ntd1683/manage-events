<?php

namespace App\Http\Query;

use App\Http\Requests\Ajax\EventFilterRequest;
use Illuminate\Database\Eloquent\Builder;

class EventFilterQuery
{
    public function __construct(public EventFilterRequest $request)
    {
    }

    public function apply(Builder $query)
    {
        $query->published()->accepted()->happened();

        if($this->request->query('q')) {
            $query->where('title', 'like', '%' . $this->request->query('q') . '%');
        }

        if($this->request->query('filter') == 1) {
            $query->orderByDesc('happened_at');
        } else if($this->request->query('filter') == 0) {
            $query->orderBy('happened_at');
        }

        return $query;
    }
}
