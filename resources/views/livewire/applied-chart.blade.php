<div>
    <h2>Total de lo aplicado</h2>
    <canvas id="appliedChart"></canvas>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx1 = document.getElementById('appliedChart');

        new Chart(ctx1, {
            type: 'doughnut',
            data: {
                labels: {!! $labels !!},
                datasets: [{
                    label: 'Total depositado',
                    data: {!! $data !!},
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
                aspectRatio: 4
            }
        });
    </script>
</div>