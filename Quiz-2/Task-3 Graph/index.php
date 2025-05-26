<?php
    $initialLabels = ["January", "February", "March", "April", "May"];
    $initialData = [10, 20, 15, 25, 30];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grafik Interaktif - Tooltip Kustom</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="main-container">
        <div class="form-container">
            <input type="text" id="inputLabel" placeholder="Label" required>
            <input type="number" id="inputValue" placeholder="Value" required>
            <button id="buttonAddData">Add Data</button>
        </div>
        <div class="chart-wrapper">
            <canvas id="myChart" width="700" height="400"></canvas>
        </div>
    </div>

    <script>
        const phpLabels = <?php echo json_encode($initialLabels); ?>;
        const phpData = <?php echo json_encode($initialData); ?>;

        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [...phpLabels],
                datasets: [{
                    data: [...phpData],
                    borderColor: 'blue',
                    backgroundColor: 'rgba(0, 0, 255, 0)',
                    tension: 0.1,
                    borderWidth: 1.5,
                    pointRadius: 0,
                    pointHoverRadius: 0,
                    hitRadius: 15,
                }]
            },
            options: {
                responsive: false,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: '#333',
                            padding: 8
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: '#333',
                            padding: 5
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        enabled: true,
                        mode: 'index',
                        intersect: false,
                        backgroundColor: '#282828',
                        titleFont: {
                            weight: '600',
                            size: 13
                        },
                        titleColor: '#ffffff',
                        titleAlign: 'center',
                        bodyFont: {
                            size: 12
                        },
                        bodyColor: '#ffffff',
                        bodyAlign: 'center',
                        padding: {
                            top: 7,
                            bottom: 7,
                            left: 10,
                            right: 10
                        },
                        cornerRadius: 4,
                        displayColors: false,
                        caretSize: 5,
                        caretPadding: 8,
                        yAlign: 'bottom',

                        callbacks: {
                            title: function(tooltipItems) {
                                if (tooltipItems.length > 0) {
                                    return tooltipItems[0].label;
                                }
                                return '';
                            },
                            label: function(tooltipItem) {
                                return tooltipItem.formattedValue;
                            }
                        }
                    }
                },
                animation: {
                    duration: 150
                },
                layout: {
                    padding: {
                        left: 5,
                        right: 200,
                        top: 10,
                        bottom: 5
                    }
                }
            }
        });

        const inputLabel = document.getElementById('inputLabel');
        const inputValue = document.getElementById('inputValue');
        const buttonAddData = document.getElementById('buttonAddData');

        buttonAddData.addEventListener('click', () => {
            const newLabel = inputLabel.value.trim();
            const newValueText = inputValue.value.trim();

            let isValid = true;
            if (newLabel === '') {
                inputLabel.reportValidity();
                isValid = false;
            }
            if (isValid && newValueText === '') {
                inputValue.reportValidity();
                isValid = false;
            }

            if (!isValid) {
                return;
            }

            const newValue = parseFloat(newValueText);
            if (isNaN(newValue)) {
                inputValue.reportValidity();
                return;
            }

            myChart.data.labels.push(newLabel);
            myChart.data.datasets.forEach((dataset) => {
                dataset.data.push(newValue);
            });
            myChart.update();

            inputLabel.value = '';
            inputValue.value = '';
            inputLabel.focus();
        });
    </script>
</body>
</html>