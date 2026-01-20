const ctx = document.getElementById('stokChart');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Pcs', 'Box', 'Botol'],
        datasets: [{
            data: [10, 7, 12],
            backgroundColor: '#5d93ad'
        }]
    },
    options: {
        plugins: { legend: { display: false } },
        scales: { y: { beginAtZero: true } }
    }
});
