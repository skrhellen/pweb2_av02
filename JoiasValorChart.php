<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Joias;
class JoiasValorChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {

        $joias = Joias::orderBy('valor','desc')->get();

        $valores = [];
        $nomes = [];

        foreach($joias as $item){
            $valores[]= $item->valor;
            $nomes[]= $item->nome;
        }

        return $this->chart
            ->polarAreaChart()
            ->setTitle('Top 3 scorers of the team.')
            ->setSubtitle('Season 2021.')
            ->addData( $valores)
            ->setLabels( $nomes);
    }
}
