@extends('layouts.app')
@section('content')
<canvas id="myChart" class="bg-light p-2"></canvas>
<script src="{{ asset('build/assets/chart.min.js') }}"></script>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['HOMME','FEMME'],
            datasets: [{
                label: 'Données du graphique',
                backgroundColor: ['blue','pink'],
                borderColor: 'rgba(255,99,132,1)',
                borderWidth: 1,
                data: [<?php
                        $age1 = 0;
                        $age2 = 0;
                        foreach ($data as $item) {
                            ($item->sexe=='Homme') ? $age1++ :$age2++;
                        }
                        echo $age1.','.$age2.',';
                        ?>]
            }]
        },
        
    });
</script>
@endsection