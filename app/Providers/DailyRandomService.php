<?php
namespace App\Providers;

use Illuminate\Support\Facades\Cache;

class DailyRandomService
{
    protected $model;
    protected $cacheKey;

    public function __construct($model, $cacheKey = 'daily_random_record')
    {
        $this->model = $model;
        $this->cacheKey = $cacheKey;
    }

    public function getDailyRandom()
    {
        return Cache::remember(
            $this->cacheKey . '_' . now()->format('Y-m-d'),
            86400, // 24 часа
            fn() => $this->model->inRandomOrder()->first()
        );
    }
}