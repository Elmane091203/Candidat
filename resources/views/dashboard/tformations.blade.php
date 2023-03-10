@extends('layouts.app')
@section('content')
<canvas id="myChart" class="bg-light p-2"></canvas>
<script src="{{ asset('build/assets/chart.min.js') }}"></script>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [<?php
                        foreach ($data as $item) {
                            echo "'".$item->libelle."'" . ',';
                        }
                        ?>],
            datasets: [{
                label: 'Nombre de formations par type',
                backgroundColor: [<?php
                foreach($data as $item){
                    echo  "'rgba(".rand(0, 255).",".rand(0, 255).",".rand(0, 255).",".rand(0, 255).")'".',';
                }
                ?>],
                borderColor: 'rgba(255,99,132,1)',
                borderWidth: 1,
                data: [<?php
                        foreach ($data as $item) {
                            $nb=0;
                            foreach ($item->referentiels as $r) {
                                $nb+=count($r->formation);
                            }
                            echo $nb. ',';
                        }
                        ?>]
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
    });
</script>
@endsection