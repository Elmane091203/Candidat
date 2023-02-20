@extends('layouts.app')
@section('content')
<canvas id="myChart" class="bg-light p-2"></canvas>
<script src="{{ asset('build/assets/chart.min.js') }}"></script>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['18ans à 25ans','25ans à 30ans','30ans à 35ans'],
            datasets: [{
                label: 'Données du graphique',
                backgroundColor: ['blue','red','green'],
                borderColor: 'rgba(255,99,132,1)',
                borderWidth: 1,
                data: [<?php
                        $age1 = 0;
                        $age2 = 0;
                        $age3 = 0;
                        foreach ($data as $item) {
                            ($item->age > 18 && $item->age <= 25) ? $age1++ : (($item->age > 25 && $item->age <= 30) ? $age2++ : $age3++);
                        }
                        echo $age1.','.$age2.','.$age3.',';
                        ?>]
            }]
        },
        
    });
</script>
@endsection