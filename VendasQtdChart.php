<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class VendasQtdChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PolarAreaChart
    {
                /*

        SELECT v.`data`, COUNT(v.id) AS count FROM venda v
	    GROUP BY v.`data`
        */
        $venda = DB::table("venda")
                    ->selectRaw('count(1) as qtdVenda, data as data_venda')
                    ->groupBy('data')->get();

        $qtdVendas = [];
        $dataVenda = [];


        foreach($venda as $item){
            $qtdVendas[]= $item->qtdVenda;
            $dataVenda[]= $item->data_venda;
        }
       // dd($qtdAlunos);

        return $this->chart->pieChart()
            ->setTitle('Quantidade de vendas')
            ->addData($qtdVendas)
            ->setLabels($dataVenda);
    }
}
