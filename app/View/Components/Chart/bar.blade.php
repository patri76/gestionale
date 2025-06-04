@props(['labels', 'data', 'title'])

<div class="bg-white p-4 rounded-2xl shadow">
    <h2 class="text-xl font-semibold mb-4 text-gray-700">{{ $title }}</h2>
    <canvas id="{{ \Str::slug($title, '_') }}"></canvas>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const ctx = document.getElementById("{{ \Str::slug($title, '_') }}").getContext("2d");
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
                            precision: 0
                        }
                    }
                }
            }
        });
    });
</script>
