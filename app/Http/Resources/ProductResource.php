<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'slug'          => $this->slug,
            "size"          => $this->size,
            "observations"  => $this->observations,
            "stock"         => $this->stock,
            "shipment"      => $this->shipment,
            "brand"         => new BrandResource( $this->brand ),
            'created'       => $this->created_at->diffForHumans(),
            'updated'       => $this->updated_at->diffForHumans(),
            'created_at'    => $this->created_at->format( 'd-m-Y' ),
            'updated_at'    => $this->updated_at->format( 'd-m-Y' ),
        ];
    }
}
