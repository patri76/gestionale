@props(['labels', 'data', 'title'])

<div class="bg-white p-3 rounded shadow">
    <h2 class="text-base font-semibold text-gray-700 mb-3">{{ $title }}</h2>
    <canvas id="chart-{{ Str::slug($title, '-') }}" class="w-full" style="height: 200px;"></canvas>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById("chart-{{ Str::slug($title, '-') }}").getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: [{
                    label: '{{ $title }}',
                    data: {!! json_encode($data) !!},
                    backgroundColor: 'rgba(0, 140, 186, 0.5)',
                    borderColor: 'rgba(0, 140, 186, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });
    });
</script>
