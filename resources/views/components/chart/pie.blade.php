@props(['labels', 'data', 'title'])

<div class="bg-white p-4 rounded-2xl shadow">
    <h2 class="text-lg font-semibold text-gray-700 mb-4">{{ $title }}</h2>
    <canvas id="chart-{{ Str::slug($title, '-') }}" class="w-full h-64"></canvas>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById("chart-{{ Str::slug($title, '-') }}").getContext('2d');
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: [{
                    label: '{{ $title }}',
                    data: {!! json_encode($data) !!},
                    backgroundColor: [
                        'rgba(0, 140, 186, 0.6)',
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)',
                        'rgba(54, 162, 235, 0.6)'
                    ],
                    borderColor: 'white',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'right'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.label || '';
                                let value = context.raw || 0;
                                return `${label}: ${value}`;
                            }
                        }
                    }
                }
            }
        });
    });
</script>
