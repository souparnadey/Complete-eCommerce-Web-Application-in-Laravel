// Default font settings
Chart.defaults.global.defaultFontFamily =
  'Nunito, -apple-system, system-ui, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Get data from backend
var orderData = window.orderStatusData || {};

// Extract labels & values
var labels = Object.keys(orderData);
var values = Object.values(orderData);

// Safety check (prevents empty chart bug)
if (labels.length === 0) {
  labels = ['No Data'];
  values = [1];
}

var ctx = document.getElementById("myPieChart");

var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: labels,
    datasets: [{
      data: values,
      backgroundColor: [
        '#4e73df', // new
        '#f6c23e', // process
        '#1cc88a', // delivered
        '#e74a3b'  // cancel
      ],
      hoverBackgroundColor: [
        '#2e59d9',
        '#dda20a',
        '#17a673',
        '#be2617'
      ],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: true,
      caretPadding: 10,
    },
    legend: {
      display: true,
      position: 'bottom'
    },
    cutoutPercentage: 75,
  },
});
