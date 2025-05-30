let data = JSON.parse(localStorage.getItem("bpData")) || [];

function updateTable() {
  const table = document.getElementById("bpTable");
  table.innerHTML = `<tr><th>Date</th><th>Systolic</th><th>Diastolic</th></tr>`;
  data.forEach(entry => {
    let row = table.insertRow();
    row.innerHTML = `<td>${entry.date}</td><td>${entry.systolic}</td><td>${entry.diastolic}</td>`;
  });
}

function updateChart() {
  const ctx = document.getElementById("bpChart").getContext("2d");
  const labels = data.map(entry => entry.date);
  const systolicData = data.map(entry => entry.systolic);
  const diastolicData = data.map(entry => entry.diastolic);

  new Chart(ctx, {
    type: 'line',
    data: {
      labels: labels,
      datasets: [
        { label: 'Systolic', data: systolicData, borderColor: 'red', fill: false },
        { label: 'Diastolic', data: diastolicData, borderColor: 'blue', fill: false }
      ]
    },
    options: { responsive: true }
  });
}

document.getElementById("bpForm").addEventListener("submit", function(e) {
  e.preventDefault();
  const date = document.getElementById("date").value;
  const systolic = parseInt(document.getElementById("systolic").value);
  const diastolic = parseInt(document.getElementById("diastolic").value);
  data.push({ date, systolic, diastolic });
  localStorage.setItem("bpData", JSON.stringify(data));
  updateTable();
  updateChart();
});

updateTable();
updateChart();
