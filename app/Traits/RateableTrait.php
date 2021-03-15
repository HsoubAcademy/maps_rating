<?php 

namespace App\Traits;

trait RateableTrait
{
    protected $count = 4;
    
    public function averageRating($place)
    {
        $avg = $place->reviews()
        ->selectRaw('avg(service_rating) service_rating, avg(quality_rating) quality_rating, avg(cleanliness_rating) cleanliness_rating, avg(pricing_rating) pricing_rating')
        ->first();

        $total = array_sum($avg->toArray()) / $this->count;

        return ['total'=> $total,
            'service_rating'=> $avg->service_rating,
            'quality_rating'=> $avg->quality_rating,
            'cleanliness_rating'=> $avg->cleanliness_rating,
            'pricing_rating'=> $avg->pricing_rating  
            ];
    }

}