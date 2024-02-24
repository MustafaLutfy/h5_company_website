<?php

namespace App\Charts;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use DB;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class WeaklySalesChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\areaChart
    {

        $lastWeek = CarbonPeriod::create(Carbon::now()->subDays(7), Carbon::now());
        $lastWeekOrders = [];
        foreach ($lastWeek as $date) {
        $lastWeekOrders['days'][] = $date->format("l");
        
        // Here is the count part that you need
        $lastWeekOrders['orders'][] = DB::table('orders')->whereDate('created_at', '=', $date)->count(); 
        }
        $dashboard_infos['lastWeekOrders'] = $lastWeekOrders;

        return $this->chart->areaChart()
        ->addData('Digital sales', $lastWeekOrders['orders'])
        ->setXAxis($lastWeekOrders['days']);
    
    }
}
