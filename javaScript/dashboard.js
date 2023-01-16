const ctx = document.getElementById('myChart').getContext('2d');

const data = {
  labels: ['Jan', 'Feb', 'Mar', 'April', 'Purple', 'Orange','Orange'],
  datasets: [{
    label: 'ไตรมาส',
    data: [65, 59, 80, 81, 56, 55, 40],
    backgroundColor: [
      'rgba(255, 99, 132, 0.2)',
      'rgba(255, 159, 64, 0.2)',
      'rgba(255, 205, 86, 0.2)',
      'rgba(75, 192, 192, 0.2)',
      'rgba(54, 162, 235, 0.2)',
      'rgba(153, 102, 255, 0.2)',
      'rgba(201, 203, 207, 0.2)'
    ],
    borderColor: [
      'rgb(255, 99, 132)',
      'rgb(255, 159, 64)',
      'rgb(255, 205, 86)',
      'rgb(75, 192, 192)',
      'rgb(54, 162, 235)',
      'rgb(153, 102, 255)',
      'rgb(201, 203, 207)'
    ],
    borderWidth: 1
  }]
};

  new Chart(ctx, {
    type: 'bar',
    data: data,
    options: {
      scales: {
        x: {
          display: false
      },
        y: {
          beginAtZero: true
        }
      }
    },
  });


  const ch_success = document.getElementById('ch-success').getContext('2d');
  const data_success = {
    labels: [
    ],
    datasets: [{
      label: 'My First Dataset',
      data: [300, 50, 100],
      backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)'
      ],
      hoverOffset: 4
    }]
  };
  new Chart(ch_success, {
    type: 'doughnut',
    data: data_success,
  });

  const ch_waiting = document.getElementById('ch_waiting').getContext('2d');
  const data_waiting = {
    labels: [
    ],
    datasets: [{
      label: 'My First Dataset',
      data: [300, 50, 100],
      backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)'
      ],
      hoverOffset: 4
    }]
  };
  new Chart(ch_waiting, {
    type: 'doughnut',
    data: data_waiting,
  });

  const ch_danger = document.getElementById('ch_danger').getContext('2d');
  const data_danger = {
    labels: [
    ],
    datasets: [{
      label: 'My First Dataset',
      data: [300, 50, 100],
      backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)'
      ],
      hoverOffset: 4
    }]
  };
  new Chart(ch_danger, {
    type: 'doughnut',
    data: data_danger,
  });