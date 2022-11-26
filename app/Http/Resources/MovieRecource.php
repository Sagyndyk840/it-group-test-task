<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MovieRecource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray ($request)
    {
        return [
            'id'           => $this->id,
            'movie_name'   => $this->movie_name,
            'slug'         => $this->slug,
            'movie_status' => $this->movie_status,
            'img'          => $this->getFirstMediaUrl('movies'),
            'created_at'   => $this->created_at,
            'updated_at'   => $this->updated_at,
            'genres'       => $this->genres,
        ];
    }
}
