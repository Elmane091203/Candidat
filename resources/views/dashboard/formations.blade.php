@extends('layouts.app')
@section('content')
<canvas id="myChart" class="bg-light p-2"></canvas>
<script src="{{ asset('build/assets/chart.min.js') }}"></script>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['En cours', 'En attente'],
            datasets: [{
                label: 'Nombre de formation',
                backgroundColor: ['blue', 'gary'],
                borderColor: 'rgba(255,99,132,1)',
                borderWidth: 1,
                data: [<?php
                        $nombre1 = 0;
                        $nombre2 = 0;
                        foreach ($data as $item) {
                            ($item->is_started == 0) ? $nombre1++ : $nombre2++;
                        }
                        echo $nombre2 . ',' . $nombre1 . ',';
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