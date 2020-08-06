<?php

namespace App\Http\Resources;

use App\Http\Resources\DeliveryStatusResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PickupResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'tracking_number' => $this->tracking_number,
            'delivery_status' => DeliveryStatusResource::collection($this->whenLoaded('deliveryStatus'))
        ];
    }
}
