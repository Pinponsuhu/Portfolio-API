<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" =>(string)$this->id,
                "created_at" => $this->created_at,
                "attributes" => [
                    "name" => $this->name,
                    "description" => $this->description,
                    "image" => $this->image,
                    "live_link" => $this->live_link,
                    "source_code" => $this->source_code,
                    "techs" => $this->techs,
                ]
                ];
    }
}
