@props(['labels', 'data', 'title'])

<div class="bg-white p-3 rounded shadow">
    <h2 class="text-base font-semibold text-gray-700 mb-3">{{ $title }}</h2>
    <canvas id="chart-{{ Str::slug($title, '-') }}" class="w-full" style="height: 200px;"></canvas>
</div>

@push('scripts')
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
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(153, 102, 255, 0.5)',
                        'rgba(255, 159, 64, 0.5)'
                    ],
                    borderColor: 'rgba(255, 255, 255, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true
            }
        });
    });
</script>
@endpush
