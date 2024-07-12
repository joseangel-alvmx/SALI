<div>
    <h2 style="width: 100%">Número de registros aplicados por día
</h2>
    <div>
        <canvas id="depositedChart" style="width: 837px;"></canvas>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('depositedChart');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! $labels !!},
                datasets: [{
                    label: 'Total lineas aplicadas por dia',
                    data: {!! $data !!},
                    borderWidth: 1,
                    borderColor: '#0085FF'
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                    }
                },
                responsive: true,
            }
        });
    </script>
</div>