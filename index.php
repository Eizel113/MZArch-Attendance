<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title>Site Attendance System v1.0</title>
  <style>
    :root { color-scheme: light; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f4f5f9; color: #1f2937; }
    * { box-sizing: border-box; }
    body { margin: 0; min-height: 100vh; display: flex; justify-content: center; align-items: stretch; background: #edf2f7; }
    .app { width: 100%; max-width: 560px; min-height: 100vh; background: #fff; box-shadow: 0 16px 40px rgba(0,0,0,0.08); display: flex; flex-direction: column; }
    header { padding: 16px 20px; background: linear-gradient(135deg, #2753ff 0%, #1f43d8 100%); color: white; }
    header h1 { margin: 0; font-size: 1.3rem; }
    main { flex: 1; padding: 16px; }
    .card { background: #f8fafc; border-radius: 14px; padding: 16px; margin-bottom: 14px; border: 1px solid #e2e8f0; }
    label { display: block; margin-bottom: 8px; font-weight: 600; }
    input, button, select { width: 100%; border: 1px solid #cbd5e1; border-radius: 10px; padding: 10px 12px; font-size: 0.95rem; font-family: inherit; }
    button { background: #2753ff; color: white; border: none; cursor: pointer; transition: all 0.2s ease; }
    button:hover:not(:disabled) { background: #1f43d8; }
    button.secondary { background: #e2e8f0; color: #1f2937; }
    button.secondary:hover:not(:disabled) { background: #cbd5e1; }
    .hidden { display: none !important; }
    .message { margin-top: 12px; padding: 12px; border-radius: 10px; font-size: 0.9rem; }
    .message.error { background: #fee2e2; color: #b91c1c; }
    .message.success { background: #dcfce7; color: #166534; }
    .message.info { background: #dbeafe; color: #0369a1; }
    .worker-grid { display: grid; gap: 12px; }
    .worker-card { background: #fff; border-radius: 12px; border: 1px solid #e2e8f0; padding: 12px; }
    .checked-badge { margin-top:8px; font-size:0.85rem; color:#065f46; background:#ecfdf5; padding:6px 8px; border-radius:8px; display:inline-block; }
    .status-pill { display: inline-flex; align-items: center; gap: 6px; padding: 6px 10px; border-radius: 20px; font-size: 0.85rem; font-weight: 600; }
    .status-present { background: #dcfce7; color: #166534; }
    .status-absent { background: #fed7aa; color: #92400e; }
    .status-leave { background: #d1d5db; color: #374151; }
    .status-pending { background: #f3f4f6; color: #475569; }
    .log-table { width: 100%; border-collapse: collapse; margin-top: 10px; }
    .log-table th, .log-table td { padding: 10px 8px; border-bottom: 1px solid #e2e8f0; text-align: left; }
    .log-table th { background: #f3f4f6; }
    .log-table tr.clickable { cursor: pointer; }
    .log-table tr.selected { background: #eef2ff; }
    .video-wrap { border-radius: 14px; overflow: hidden; background: black; margin-top: 12px; }
    video { width: 100%; height: auto; display: block; }
    .top-row { display: flex; gap: 12px; flex-wrap: wrap; margin-bottom: 12px; }
    .top-row > div { flex: 1; min-width: 140px; }
    /* Modal for worker history */
    <!doctype html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
      <title>Site Attendance System v1.0</title>
      <style>
        :root { color-scheme: light; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f4f5f9; color: #1f2937; }
        * { box-sizing: border-box; }
        body { margin: 0; min-height: 100vh; display: flex; justify-content: center; align-items: stretch; background: #edf2f7; }
        .app { width: 100%; max-width: 560px; min-height: 100vh; background: #fff; box-shadow: 0 16px 40px rgba(0,0,0,0.08); display: flex; flex-direction: column; }
        header { padding: 16px 20px; background: linear-gradient(135deg, #2753ff 0%, #1f43d8 100%); color: white; }
        header h1 { margin: 0; font-size: 1.3rem; }
        main { flex: 1; padding: 16px; }
        .card { background: #f8fafc; border-radius: 14px; padding: 16px; margin-bottom: 14px; border: 1px solid #e2e8f0; }
        label { display: block; margin-bottom: 8px; font-weight: 600; }
        input, button, select { width: 100%; border: 1px solid #cbd5e1; border-radius: 10px; padding: 10px 12px; font-size: 0.95rem; font-family: inherit; }
        button { background: #2753ff; color: white; border: none; cursor: pointer; transition: all 0.2s ease; }
        button:hover:not(:disabled) { background: #1f43d8; }
        button.secondary { background: #e2e8f0; color: #1f2937; }
        button.secondary:hover:not(:disabled) { background: #cbd5e1; }
        .hidden { display: none !important; }
        .message { margin-top: 12px; padding: 12px; border-radius: 10px; font-size: 0.9rem; }
        .message.error { background: #fee2e2; color: #b91c1c; }
        .message.success { background: #dcfce7; color: #166534; }
        .message.info { background: #dbeafe; color: #0369a1; }
        .worker-grid { display: grid; gap: 12px; }
        .worker-card { background: #fff; border-radius: 12px; border: 1px solid #e2e8f0; padding: 12px; }
        .status-pill { display: inline-flex; align-items: center; gap: 6px; padding: 6px 10px; border-radius: 20px; font-size: 0.85rem; font-weight: 600; }
        .status-present { background: #dcfce7; color: #166534; }
        .status-absent { background: #fed7aa; color: #92400e; }
        .status-leave { background: #d1d5db; color: #374151; }
        .status-pending { background: #f3f4f6; color: #475569; }
        .log-table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        .log-table th, .log-table td { padding: 10px 8px; border-bottom: 1px solid #e2e8f0; text-align: left; }
        .log-table th { background: #f3f4f6; }
        .video-wrap { border-radius: 14px; overflow: hidden; background: black; margin-top: 12px; }
        video { width: 100%; height: auto; display: block; }
        .top-row { display: flex; gap: 12px; flex-wrap: wrap; margin-bottom: 12px; }
        .top-row > div { flex: 1; min-width: 140px; }
        /* Modal for worker history */
        .modal-backdrop { position: fixed; inset: 0; background: rgba(15,23,42,0.5); display: flex; align-items: center; justify-content: center; z-index: 60; }
        .modal { background: white; border-radius: 12px; width: 92%; max-width: 640px; padding: 16px; box-shadow: 0 12px 32px rgba(0,0,0,0.18); }
        .modal h3 { margin: 0 0 8px 0; }
        .modal .close { float: right; background: transparent; border: none; font-size: 1rem; cursor: pointer; }
        .small-note { font-size: 0.85rem; color: #475569; }
      </style>
    </head>
    <body>
      <div class="app">
        <header>
          <h1>Site Attendance System</h1>
        </header>
        <main>
          <section id="loginSection">
            <div class="card">
              <strong style="display:block; text-align:center; margin-bottom:14px;">Head/Admin Login</strong>
              <label for="username">Username</label>
              <input id="username" type="text" autocomplete="username" placeholder="head">
              <label for="password" style="margin-top:12px;">Password</label>
              <input id="password" type="password" autocomplete="current-password" placeholder="site123">
              <button id="loginButton" style="margin-top:14px;">Sign In</button>
              <div id="loginError" class="message error hidden">Invalid credentials</div>
              <p class="small-note" style="margin-top:12px; text-align:center;">Demo: head / site123</p>
            </div>
          </section>
          <section id="dashboardSection" class="hidden">
            <div class="card">
              <div class="top-row">
                <div>
                  <strong>Today's Date</strong>
                  <p id="currentDayDisplay" style="margin:8px 0 0; font-weight:600;"></p>
                </div>
                <div>
                  <strong>Attendance</strong>
                  <p id="attendanceCount" style="margin:8px 0 0; font-weight:600;">0 present</p>
                </div>
              </div>
            </div>
            <div class="card">
              <strong>Scan / Manual Entry</strong>
              <button id="startScanButton" style="margin-top:12px;">Start Camera Scan</button>
              <button id="stopScanButton" class="secondary hidden" style="margin-top:10px;">Stop Camera</button>
              <div id="scanMessage" class="message info hidden"></div>
              <div id="scannerArea" class="hidden"><div class="video-wrap"><video id="video" autoplay muted playsinline></video></div></div>
              <label for="manualCode" style="margin-top:12px;">Manual QR code</label>
              <input id="manualCode" type="text" placeholder="W-001">
              <button id="manualScanButton" class="secondary" style="margin-top:10px;">Mark Present</button>
            </div>
            <div class="card">
              <strong>Workers on Site</strong>
              <div class="worker-grid" id="workerList"></div>
            </div>
            <div class="card">
              <strong>Today's Attendance Log</strong>
              <div style="display:flex; gap:8px; align-items:center; margin-top:8px; flex-wrap:wrap;">
                <label style="margin:0; font-weight:600;">Date</label>
                <input id="reportDate" type="date" style="max-width:180px;" />
                <button id="exportCsvBtn" class="secondary" style="width:auto;">Export CSV</button>
                <button id="exportWeeklyCsvBtn" class="secondary" style="width:auto;">Export Weekly CSV</button>
              </div>
              <table class="log-table" style="margin-top:8px;">
                <thead><tr><th>Name</th><th>Status</th><th>Time</th></tr></thead>
                <tbody id="attendanceBody"></tbody>
              </table>
            </div>
            <!-- Previous Attendance Records removed per request -->
            
            <div class="card">
              <strong>Mon–Sat Attendance Summary (This Week)</strong>
              <div style="overflow-x:auto; margin-top:8px;">
                <table class="log-table" id="monSatReport">
                  <thead>
                    <tr><th style="text-align:left;">Day</th><th>Present</th><th>Absent</th></tr>
                  </thead>
                  <tbody></tbody>
                </table>
              </div>
              <p class="small-note" style="margin-top:8px;">Counts are for the current week (Monday → Saturday).</p>
            </div>
            <button id="resetButton" class="secondary" style="width:100%; margin-bottom:10px; background:#f43f5e; border-color:#f43f5e;">Reset Today's Attendance</button>
            <button id="logoutButton" class="secondary" style="width:100%;">Logout</button>
          </section>
          <!-- Worker history modal -->
          <div id="workerHistoryModal" class="hidden">
            <div class="modal-backdrop" id="workerHistoryBackdrop">
              <div class="modal" role="dialog" aria-modal="true">
                <button class="close" id="closeHistory">✕</button>
                <h3 id="historyTitle">Attendance History</h3>
                <p class="small-note" id="historySubtitle">Showing records for selected worker</p>
                <div style="margin-top:12px; max-height:340px; overflow:auto;">
                  <table class="log-table">
                    <thead><tr><th>Date</th><th>Status</th><th>Time</th></tr></thead>
                    <tbody id="workerHistoryBody"></tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </main>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/jsqr@1.4.0/dist/jsQR.min.js"></script>
      <script>
        const CONFIG = { credentials: { username: 'head', password: 'site123' } };
        const workers = [
          { id: 'W-001', name: 'Miguel Santos', role: 'Foreman', rate: 900 },
          { id: 'W-002', name: 'Anna Cruz', role: 'Welder', rate: 850 },
          { id: 'W-003', name: 'Jomar Reyes', role: 'Electrician', rate: 700 },
          { id: 'W-004', name: 'Rhea Lopez', role: 'Mason', rate: 750 }
        ];
        const attendanceRecords = JSON.parse(localStorage.getItem('siteAttendance') || '{}');
        let scanning = false;
        let videoStream = null;
        let scanAnimation = null;
        const loginSection = document.getElementById('loginSection');
        const dashboardSection = document.getElementById('dashboardSection');
        const usernameInput = document.getElementById('username');
        const passwordInput = document.getElementById('password');
        const loginButton = document.getElementById('loginButton');
        const logoutButton = document.getElementById('logoutButton');
        const loginError = document.getElementById('loginError');
        const currentDayDisplay = document.getElementById('currentDayDisplay');
        const attendanceCount = document.getElementById('attendanceCount');
        const workerList = document.getElementById('workerList');
        const attendanceBody = document.getElementById('attendanceBody');
        const startScanButton = document.getElementById('startScanButton');
        const stopScanButton = document.getElementById('stopScanButton');
        const scannerArea = document.getElementById('scannerArea');
        const scanMessage = document.getElementById('scanMessage');
        const manualCode = document.getElementById('manualCode');
        const manualScanButton = document.getElementById('manualScanButton');
        const videoElement = document.getElementById('video');
        const resetButton = document.getElementById('resetButton');
        const reportDate = document.getElementById('reportDate');
        const exportCsvBtn = document.getElementById('exportCsvBtn');
        const exportWeeklyCsvBtn = document.getElementById('exportWeeklyCsvBtn');
        const recordsList = document.getElementById('recordsList');

        loginButton.addEventListener('click', handleLogin);
        logoutButton.addEventListener('click', handleLogout);
        startScanButton.addEventListener('click', startScanner);
        stopScanButton.addEventListener('click', stopScanner);
        manualScanButton.addEventListener('click', () => handleQrResult(manualCode.value.trim()));
        if (resetButton) resetButton.addEventListener('click', resetTodayAttendance);

        function getTodayKey() { return new Date().toISOString().split('T')[0]; }
        function getTodayDate() { return new Date().toLocaleDateString('en-PH'); }
        function showSection(section) {
          loginSection.classList.toggle('hidden', section !== 'login');
          dashboardSection.classList.toggle('hidden', section !== 'dashboard');
        }
        function handleLogin() {
          const username = usernameInput.value.trim();
          const password = passwordInput.value.trim();
          if (username === CONFIG.credentials.username && password === CONFIG.credentials.password) {
            loginError.classList.add('hidden');
            usernameInput.value = '';
            passwordInput.value = '';
            showSection('dashboard');
            renderDashboard();
          } else {
            loginError.classList.remove('hidden');
          }
        }
        function handleLogout() {
          stopScanner();
          showSection('login');
        }
        function renderDashboard() {
          currentDayDisplay.textContent = getTodayDate();
          // If it's past the daily deadline, mark unscanned workers as absent
          markAbsenteesAfterDeadline();
          renderWorkers();
          // initialize report date input and records list
          const todayKey = getTodayKey();
          if (reportDate) reportDate.value = todayKey;
          if (reportDate) reportDate.addEventListener('change', () => renderAttendanceForDate(reportDate.value));
          if (exportCsvBtn) exportCsvBtn.addEventListener('click', () => exportCsvForDate(reportDate.value || getTodayKey()));
          if (exportWeeklyCsvBtn) exportWeeklyCsvBtn.addEventListener('click', () => exportWeeklyFormatCsv());
          renderAttendanceForDate(todayKey);
          listAttendanceDates();
          updateStats();
          renderMonSatReport();
        }

        // Mark unscanned workers as absent automatically after 5:00 PM
        function markAbsenteesAfterDeadline() {
          try {
            const now = new Date();
            const deadlineHour = 17; // 5 PM local time
            if (now.getHours() < deadlineHour) return;
            const today = getTodayKey();
            if (!attendanceRecords[today]) attendanceRecords[today] = {};
            let changed = false;
            workers.forEach(w => {
              if (!attendanceRecords[today][w.id]) {
                attendanceRecords[today][w.id] = { status: 'absent', time: '' };
                changed = true;
              }
            });
            if (changed) {
              localStorage.setItem('siteAttendance', JSON.stringify(attendanceRecords));
              renderWorkers();
              renderAttendance();
              updateStats();
              renderMonSatReport();
              if (scanMessage) {
                scanMessage.textContent = 'Unscanned workers were marked absent at 5:00 PM';
                scanMessage.classList.remove('hidden');
                scanMessage.classList.remove('error');
                scanMessage.classList.add('message', 'info');
                setTimeout(() => { scanMessage.classList.add('hidden'); }, 3000);
              }
            }
          } catch (e) {
            console.error('markAbsenteesAfterDeadline error', e);
          }
        }

        function renderAttendanceForDate(dateKey) {
          if (!dateKey) dateKey = getTodayKey();
          attendanceBody.innerHTML = '';
          const records = attendanceRecords[dateKey] || {};
          workers.forEach(worker => {
            const rec = records[worker.id];
            const status = rec ? rec.status : 'pending';
            const time = rec ? rec.time : '-';
            const row = document.createElement('tr');
            row.innerHTML = `<td>${worker.name}</td><td>${status === 'present' ? 'Present' : status === 'absent' ? 'Absent' : status === 'leave' ? 'Leave' : 'Pending'}</td><td>${time}</td>`;
            attendanceBody.appendChild(row);
          });
          // update attendance count for selected date
          const present = Object.values(records).filter(r => r.status === 'present').length;
          attendanceCount.textContent = `${present} present`;
        }

        function listAttendanceDates() {
          if (!recordsList) return;
          const keys = Object.keys(attendanceRecords).sort().reverse();
          if (keys.length === 0) {
            recordsList.innerHTML = '<div class="small-note">No records yet</div>';
            return;
          }
          recordsList.innerHTML = keys.map(k => {
            const recs = attendanceRecords[k] || {};
            const present = Object.values(recs).filter(r => r.status === 'present').length;
            const total = Object.keys(recs).length;
            return `<button class="secondary" data-date="${k}" style="text-align:left;">${k} — ${present} present (${total} records)</button>`;
          }).join('');
          // attach click handlers
          recordsList.querySelectorAll('button[data-date]').forEach(btn => {
            btn.addEventListener('click', () => {
              const d = btn.getAttribute('data-date');
              if (reportDate) reportDate.value = d;
              renderAttendanceForDate(d);
            });
          });
        }

        function exportCsvForDate(dateKey) {
          if (!dateKey) dateKey = getTodayKey();
          const records = attendanceRecords[dateKey] || {};
          const dayName = new Date(dateKey).toLocaleDateString('en-PH', { weekday: 'long' });
          const lines = ['Date,Day,Name,Status,Time'];
          workers.forEach(w => {
            const r = records[w.id];
            const status = r ? r.status : 'pending';
            const time = r ? r.time : '';
            // Date and Day columns first
            lines.push(`"${dateKey}","${dayName}","${w.name}",${status},${time}`);
          });
          const blob = new Blob([lines.join('\n')], { type: 'text/csv' });
          const url = URL.createObjectURL(blob);
          const a = document.createElement('a'); a.href = url; a.download = `attendance-${dateKey}.csv`; document.body.appendChild(a); a.click(); a.remove(); URL.revokeObjectURL(url);
        }

        function exportWeeklyFormatCsv() {
          const today = new Date();
          const day = today.getDay();
          const diffToMonday = (day + 6) % 7;
          const monday = new Date(today);
          monday.setDate(today.getDate() - diffToMonday);
          const dateKeys = [];
          for (let i = 0; i < 6; i++) {
            const d = new Date(monday);
            d.setDate(monday.getDate() + i);
            dateKeys.push(d.toISOString().split('T')[0]);
          }
          const headers = [
            'No.','Name','Rate/Day','Position','Mon Hrs','Tue Hrs','Wed Hrs','Thu Hrs','Fri Hrs','Sat Hrs','Total Hrs','Under Time (hrs)','OT (hrs)','Gross Weekly Pay','Cash Advance Paid Wed','Remaining Pay Paid Sat','Remarks'
          ];
          const lines = [headers.join(',')];
          workers.forEach((worker, index) => {
            const row = [
              index + 1,
              `"${worker.name}"`,
              '"' + (worker.rate || '') + '"',
              `"${worker.role}"`
            ];
            let totalHours = 0;
            const hours = dateKeys.map(dateKey => {
              const rec = attendanceRecords[dateKey] && attendanceRecords[dateKey][worker.id];
              const hr = rec && rec.status === 'present' ? 8 : 0;
              totalHours += hr;
              return hr;
            });
            row.push(...hours);
            row.push(totalHours);
            row.push('0');
            row.push('0');
            const rate = Number(worker.rate || 0);
            const gross = rate * totalHours;
            row.push(gross ? `"₱${gross.toFixed(2)}"` : '""');
            row.push('"0"');
            row.push(gross ? `"₱${gross.toFixed(2)}"` : '""');
            row.push('""');
            lines.push(row.join(','));
          });
          const blob = new Blob([lines.join('\n')], { type: 'text/csv' });
          const url = URL.createObjectURL(blob);
          const a = document.createElement('a');
          a.href = url;
          a.download = `weekly-attendance-${getTodayKey()}.csv`;
          document.body.appendChild(a);
          a.click();
          a.remove();
          URL.revokeObjectURL(url);
        }


        function getWorkerStatus(id) {
          const today = getTodayKey();
          const record = attendanceRecords[today] ? attendanceRecords[today][id] : null;
          return record ? record.status : 'pending';
        }
        function getWorkerTime(id) {
          const today = getTodayKey();
          const record = attendanceRecords[today] ? attendanceRecords[today][id] : null;
          return record ? record.time : '-';
        }
        function renderWorkers() {
          workerList.innerHTML = '';
          workers.forEach(worker => {
            const status = getWorkerStatus(worker.id);
            const statusClass = status === 'present' ? 'status-present' : status === 'absent' ? 'status-absent' : status === 'leave' ? 'status-leave' : 'status-pending';
            const statusText = status === 'present' ? 'Present' : status === 'absent' ? 'Absent' : status === 'leave' ? 'Leave' : 'Not scanned';
            const card = document.createElement('div');
            card.className = 'worker-card';
            const time = getWorkerTime(worker.id);
            let badgeHtml = '';
            if (status === 'present') {
              badgeHtml = `<div class="checked-badge">Checked at ${time}</div>`;
            }
            card.innerHTML = `<strong class="worker-name">${worker.name}</strong><p>${worker.role}</p><span class="status-pill ${statusClass}">${statusText}</span>${badgeHtml}`;
            card.tabIndex = 0;
            card.dataset.id = worker.id;
            card.addEventListener('click', () => showWorkerHistory(worker.id));
            card.addEventListener('keypress', (e) => { if (e.key === 'Enter') showWorkerHistory(worker.id); });
            workerList.appendChild(card);
          });
        }

        function showWorkerHistory(workerId) {
          const modal = document.getElementById('workerHistoryModal');
          const backdrop = document.getElementById('workerHistoryBackdrop');
          const body = document.getElementById('workerHistoryBody');
          const title = document.getElementById('historyTitle');
          const subtitle = document.getElementById('historySubtitle');
          const worker = workers.find(w => w.id === workerId);
          if (!worker) return;
          title.textContent = `${worker.name} — Attendance`;
          subtitle.textContent = `Worker ID: ${worker.id} • ${worker.role}`;
          // Gather records across all dates
          const entries = [];
          Object.keys(attendanceRecords).sort().reverse().forEach(dateKey => {
            const rec = attendanceRecords[dateKey] && attendanceRecords[dateKey][workerId];
            if (rec) entries.push({ date: dateKey, status: rec.status, time: rec.time });
          });
          if (entries.length === 0) {
            body.innerHTML = '<tr><td colspan="3">No records found</td></tr>';
          } else {
            body.innerHTML = entries.map(e => `<tr><td>${e.date}</td><td>${e.status.charAt(0).toUpperCase()+e.status.slice(1)}</td><td>${e.time || '-'}</td></tr>`).join('');
          }
          modal.classList.remove('hidden');
          backdrop.addEventListener('click', closeWorkerHistory);
          document.getElementById('closeHistory').addEventListener('click', closeWorkerHistory);
        }

        function closeWorkerHistory() {
          const modal = document.getElementById('workerHistoryModal');
          const backdrop = document.getElementById('workerHistoryBackdrop');
          modal.classList.add('hidden');
          if (backdrop) backdrop.removeEventListener('click', closeWorkerHistory);
          const closeBtn = document.getElementById('closeHistory');
          if (closeBtn) closeBtn.removeEventListener('click', closeWorkerHistory);
        }
        function renderAttendance() {
          attendanceBody.innerHTML = '';
          workers.forEach(worker => {
            const status = getWorkerStatus(worker.id);
            const time = getWorkerTime(worker.id);
            const row = document.createElement('tr');
            row.innerHTML = `<td>${worker.name}</td><td>${status === 'present' ? 'Present' : status === 'absent' ? 'Absent' : status === 'leave' ? 'Leave' : 'Pending'}</td><td>${time}</td>`;
            attendanceBody.appendChild(row);
          });
        }
        function updateStats() {
          const present = workers.filter(w => getWorkerStatus(w.id) === 'present').length;
          attendanceCount.textContent = `${present} present`;
        }
        function saveTodayRecord(id, status) {
          const today = getTodayKey();
          if (!attendanceRecords[today]) attendanceRecords[today] = {};
          // Prevent multiple attendance records per worker per day
          if (attendanceRecords[today][id]) {
            return false; // already recorded today
          }
          attendanceRecords[today][id] = { status, time: new Date().toLocaleTimeString('en-PH', { hour: '2-digit', minute: '2-digit' }) };
          localStorage.setItem('siteAttendance', JSON.stringify(attendanceRecords));
          renderWorkers();
          renderAttendance();
          updateStats();
          renderMonSatReport();
          return true;
        }

        

        function resetTodayAttendance() {
          const today = getTodayKey();
          if (!attendanceRecords[today] || Object.keys(attendanceRecords[today]).length === 0) {
            alert('No attendance records found for today.');
            return;
          }
          const ok = confirm('Reset all attendance records for today? This cannot be undone.');
          if (!ok) return;
          delete attendanceRecords[today];
          localStorage.setItem('siteAttendance', JSON.stringify(attendanceRecords));
          renderWorkers();
          renderAttendance();
          updateStats();
          renderMonSatReport();
          scanMessage.textContent = 'Today\'s attendance has been reset';
          scanMessage.classList.remove('hidden');
          scanMessage.classList.remove('error');
          scanMessage.classList.add('message', 'info');
          setTimeout(() => scanMessage.classList.add('hidden'), 2200);
        }

        // Render Monday → Saturday attendance counts for current week
        function renderMonSatReport() {
          const tbody = document.querySelector('#monSatReport tbody');
          if (!tbody) return;
          // Find Monday of current week
          const today = new Date();
          const day = today.getDay(); // 0=Sun..6=Sat
          const diffToMonday = (day + 6) % 7; // days to subtract to get Monday
          const monday = new Date(today);
          monday.setDate(today.getDate() - diffToMonday);

          const rows = [];
          for (let i = 0; i < 6; i++) { // Monday -> Saturday
            const d = new Date(monday);
            d.setDate(monday.getDate() + i);
            const key = d.toISOString().split('T')[0];
            const records = attendanceRecords[key] || {};
            let present = 0; let absent = 0;
            Object.values(records).forEach(r => {
              if (r.status === 'present') present++;
              else if (r.status === 'absent') absent++;
            });
            const dayName = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'][d.getDay()];
            rows.push({ dayName, present, absent, date: key });
          }

          // Populate table (each row has data-date for selecting)
          tbody.innerHTML = rows.map(r => `<tr class="clickable" data-date="${r.date}"><td><strong>${r.dayName}</strong></td><td>${r.present}</td><td>${r.absent}</td></tr>`).join('');
          // attach click handlers to show that day's attendance
          tbody.querySelectorAll('tr.clickable').forEach(tr => {
            tr.addEventListener('click', () => {
              const d = tr.getAttribute('data-date');
              // clear previous selection
              tbody.querySelectorAll('tr').forEach(r => r.classList.remove('selected'));
              tr.classList.add('selected');
              if (reportDate) reportDate.value = d;
              renderAttendanceForDate(d);
            });
          });
        }
        function showScannerError(message) {
          scanMessage.textContent = message;
          scanMessage.classList.remove('hidden');
          scanMessage.classList.remove('info');
          scanMessage.classList.add('message', 'error');
        }

        async function startScanner() {
          if (scanning) return;

          const requestStream = async () => {
            if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
              return navigator.mediaDevices.getUserMedia({ video: { facingMode: { ideal: 'environment' } } });
            }
            if (navigator.getUserMedia) {
              return new Promise((resolve, reject) => {
                navigator.getUserMedia({ video: { facingMode: 'environment' } }, resolve, reject);
              });
            }
            if (navigator.webkitGetUserMedia) {
              return new Promise((resolve, reject) => {
                navigator.webkitGetUserMedia({ video: { facingMode: 'environment' } }, resolve, reject);
              });
            }
            throw new Error('No camera API found');
          };

          try {
            videoStream = await requestStream();
            videoElement.srcObject = videoStream;
            videoElement.muted = true;
            await videoElement.play();
            scanning = true;
            scannerArea.classList.remove('hidden');
            stopScanButton.classList.remove('hidden');
            startScanButton.classList.add('hidden');
            scanMessage.textContent = 'Scanning...';
            scanMessage.classList.remove('hidden');
            scanMessage.classList.remove('error');
            scanMessage.classList.add('message', 'info');
            scanAnimation = requestAnimationFrame(scanFrame);
          } catch (error) {
            showScannerError('Camera permission was denied or the camera is unavailable. Please open this page in Safari on your iPhone, allow camera access, and try again.');
          }
        }
        function stopScanner() {
          if (!scanning) return;
          scanning = false;
          cancelAnimationFrame(scanAnimation);
          if (videoStream) {
            videoStream.getTracks().forEach(track => track.stop());
            videoStream = null;
          }
          videoElement.pause();
          videoElement.srcObject = null;
          scannerArea.classList.add('hidden');
          stopScanButton.classList.add('hidden');
          startScanButton.classList.remove('hidden');
          scanMessage.classList.add('hidden');
        }
        function scanFrame() {
          if (!scanning) return;
          const canvas = document.createElement('canvas');
          const context = canvas.getContext('2d');
          canvas.width = videoElement.videoWidth;
          canvas.height = videoElement.videoHeight;
          if (canvas.width === 0 || canvas.height === 0) {
            scanAnimation = requestAnimationFrame(scanFrame);
            return;
          }
          context.drawImage(videoElement, 0, 0, canvas.width, canvas.height);
          const imageData = context.getImageData(0, 0, canvas.width, canvas.height);
          const code = jsQR(imageData.data, imageData.width, imageData.height, { inversionAttempts: 'attemptBoth' });
          if (code && code.data) {
            handleQrResult(code.data.trim());
          } else {
            scanAnimation = requestAnimationFrame(scanFrame);
          }
        }
        function handleQrResult(data) {
          if (!data) return;
          const raw = String(data).trim();
          // try exact id match (case-insensitive)
          let worker = workers.find(w => w.id === raw || w.id.toLowerCase() === raw.toLowerCase());
          // try to extract code like W-001, W001, W1, etc.
          if (!worker) {
            const m = raw.match(/W-?0*(\d+)/i);
            if (m) {
              const normalized = 'W-' + String(m[1]).padStart(3, '0');
              worker = workers.find(w => w.id === normalized);
            }
          }
          if (!worker) {
            scanMessage.textContent = `Unknown QR code: ${raw}`;
            scanMessage.classList.remove('hidden');
            scanMessage.classList.remove('info');
            scanMessage.classList.add('message', 'error');
            if (scanning) {
              // resume scanning after short delay
              setTimeout(() => { scanMessage.classList.add('hidden'); scanAnimation = requestAnimationFrame(scanFrame); }, 1200);
            }
            return;
          }
          const saved = saveTodayRecord(worker.id, 'present');
          if (!saved) {
            scanMessage.textContent = `${worker.name} has already been marked today`;
            scanMessage.classList.remove('hidden');
            scanMessage.classList.remove('success');
            scanMessage.classList.add('message', 'info');
            if (scanning) {
              setTimeout(() => { scanMessage.classList.add('hidden'); scanAnimation = requestAnimationFrame(scanFrame); }, 1200);
            }
            return;
          }
          scanMessage.textContent = `${worker.name} marked present`;
          scanMessage.classList.remove('hidden');
          scanMessage.classList.remove('error');
          scanMessage.classList.add('message', 'success');
          if (scanning) {
            setTimeout(() => { scanMessage.classList.add('hidden'); scanAnimation = requestAnimationFrame(scanFrame); }, 1200);
          }
        }
        document.addEventListener('DOMContentLoaded', () => {
          showSection('login');
        });
        // Periodically check (every minute) to mark absentees when crossing the deadline
        setInterval(() => {
          // Only run when dashboard is visible
          if (!dashboardSection.classList.contains('hidden')) markAbsenteesAfterDeadline();
        }, 60 * 1000);
      </script>
    </body>
    </html>