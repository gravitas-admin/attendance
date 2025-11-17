// DOM elements
const teacherSelect = document.getElementById('teacherSelect');
const batchSelect = document.getElementById('batchSelect');
const attDate = document.getElementById('attDate');
const teacherNameEl = document.getElementById('teacherName');
const subjectNameEl = document.getElementById('subjectName');
const batchNameEl = document.getElementById('batchName');
const totalStudentsEl = document.getElementById('totalStudents');
const absentCountEl = document.getElementById('absentCount');
const studentsTbody = document.querySelector('#studentsTable tbody');
const subInfo = document.getElementById('subInfo');
const todayDateEl = document.getElementById('todayDate');
const reportContent = document.getElementById('reportContent');

// render teacher specific UI
function renderForTeacher(tid){
  state.teacherId = tid;
  const t = DATA.teachers.find(x=>x.id===tid);
  teacherNameEl.textContent = t.name;
  subjectNameEl.textContent = t.subject;

  // populate batch select
  batchSelect.innerHTML = '';
  t.batches.forEach(bid=>{
    const b = DATA.batches.find(x=>x.id===bid);
    const opt=document.createElement('option');
     opt.value=b.id; 
     opt.textContent=b.name; 
     batchSelect.appendChild(opt);
  });

  state.batchId = t.batches[0];
  resetAttendance();
  renderStudents();
  updateSummary();
  subInfo.textContent = `Taking attendance for ${t.subject} — ${DATA.batches.find(x=>x.id===state.batchId).name}. Select date and toggle absent students.`;
}

// attendance defaults
function resetAttendance(){
  state.attendance = {};
  const students = STUDENTS_BY_BATCH[state.batchId]||[];
  students.forEach(s=> state.attendance[s.roll]='present');
}

// render students table
function renderStudents(){
  const students = STUDENTS_BY_BATCH[state.batchId]||[];
  studentsTbody.innerHTML = '';
  students.forEach(s=>{
    const tr=document.createElement('tr');
    tr.innerHTML = `<td style="width:70px">${s.roll}</td>
      <td><div style="display:flex;align-items:center;gap:12px"><div class="avatar">${String(s.name.split(' ').pop()).slice(0,2)}</div><div><div style="font-weight:700">${s.name}</div><div class="muted" style="font-size:13px">Roll No: ${s.roll}</div></div></div></td>
      <td style="text-align:center"><div class="toggle-switch" data-roll="${s.roll}" onclick="toggleAbsent(event)"><div class="toggle-knob"></div></div></td>`;
    studentsTbody.appendChild(tr);
  });
  applyAttendanceUI();
}

// apply UI to toggles
function applyAttendanceUI(){
  document.querySelectorAll('.toggle-switch').forEach(sw=>{
    const roll=Number(sw.dataset.roll);
    if(state.attendance[roll]==='absent') sw.classList.add('absent'); 
    else sw.classList.remove('absent');
  });
}

// summary update
function updateSummary(){
  const students = STUDENTS_BY_BATCH[state.batchId]||[];
  totalStudentsEl.textContent = students.length;
  absentCountEl.textContent = Object.values(state.attendance).filter(v=>v==='absent').length;
  batchNameEl.textContent = DATA.batches.find(b=>b.id===state.batchId).name;
  subjectNameEl.textContent = DATA.teachers.find(t=>t.id===state.teacherId).subject;
}

// modal summary & save
function openSummary(){
  const t = DATA.teachers.find(x=>x.id===state.teacherId);
  const batchName = DATA.batches.find(b=>b.id===state.batchId).name;
  const date = attDate.value || state.date;
  const absentList = Object.entries(state.attendance).filter(([r,v])=>v==='absent').map(([r])=>{
    const s = (STUDENTS_BY_BATCH[state.batchId]||[]).find(x=>x.roll===Number(r));
    return s ? s.name : `Roll ${r}`;
  });

  const body = document.getElementById('modalBody');
  body.innerHTML = `<div style="font-size:14px;color:var(--muted)">Teacher</div>
    <div style="font-weight:800;margin-bottom:6px">${t.name} — ${t.subject}</div>
    <div style="font-size:14px;color:var(--muted)">Batch & Date</div>
    <div style="font-weight:700;margin-bottom:8px">${batchName} • ${date}</div>
    <div style="font-size:14px;color:var(--muted)">Absent Students (${absentList.length})</div>
    <div style="margin-top:8px">${absentList.length ? '<ul style=\"margin:6px 0 0 18px;padding:0;\">' + absentList.map(n=>`<li style=\"margin-bottom:6px\">${n}</li>`).join('') + '</ul>' : '<div style=\"margin-top:6px;font-weight:700;color:green\">None — All present</div>'}</div>`;
  document.getElementById('modalBackdrop').classList.add('show');
}

// modal helper
function closeModal(){ document.getElementById('modalBackdrop').classList.remove('show'); }

// Reports functions
function generateReport(){
  const q = document.getElementById('studentSearch').value.trim();
  if(q) showStudentReport(q);
  else {
    const hist = loadHistory();
    if(hist.length===0){ reportContent.innerHTML = '<div class="muted">No attendance history available yet.</div>'; showView('reports'); return; }
    const batchId = state.batchId;
    const students = STUDENTS_BY_BATCH[batchId]||[];
    const summary = students.map(s=>{
      const records = hist.filter(h=>h.batchId===batchId);
      const totalDays = records.length;
      const absentDays = records.filter(r=> r.absent.includes(s.roll)).length;
      const presentDays = totalDays - absentDays;
      const percent = totalDays ? Math.round((presentDays/totalDays)*100) : 100;
      return {roll:s.roll,name:s.name,totalDays,absentDays,presentDays,percent};
    });

    let html = `<div style="font-weight:700;margin-bottom:8px">${DATA.batches.find(b=>b.id===batchId).name} — Batch Summary</div>`;
    html += `<table><thead><tr><th>Roll</th><th>Name</th><th>Total</th><th>Absent</th><th>Present</th><th>%</th></tr></thead><tbody>`;
    summary.forEach(r=> html += `<tr><td>${r.roll}</td><td>${r.name}</td><td>${r.totalDays}</td><td>${r.absentDays}</td><td>${r.presentDays}</td><td>${r.percent}%</td></tr>`);
    html += `</tbody></table><div style="margin-top:10px"><button class="btn primary" onclick="downloadBatchReport()">Download Batch CSV</button></div>`;
    reportContent.innerHTML = html;
    showView('reports');
  }
}

function showStudentReport(query){
  const hist = loadHistory();
  const batchId = state.batchId;
  const students = STUDENTS_BY_BATCH[batchId]||[];
  let found = null;
  const q = String(query).trim().toLowerCase();
  if(/^\d+$/.test(q)) found = students.find(s=> s.roll === Number(q));
  if(!found) found = students.find(s=> s.name.toLowerCase().includes(q));
  if(!found){ reportContent.innerHTML = `<div class="muted">No student found for "${query}" in ${DATA.batches.find(b=>b.id===batchId).name}.</div>`; return; }
  const records = hist.filter(h=> h.batchId===batchId);
  const totalDays = records.length;
  const absentDays = records.filter(r=> r.absent.includes(found.roll)).length;
  const presentDays = totalDays - absentDays;
  const percent = totalDays ? Math.round((presentDays/totalDays)*100) : 100;
  
  let html = `<div style="font-weight:800">${found.name} — Roll ${found.roll}</div>`;
  html += `<div class="muted" style="margin-top:6px">Batch: ${DATA.batches.find(b=>b.id===batchId).name}</div>`;
  html += `<div style="margin-top:12px"><table><tr><th>Total Days</th><td>${totalDays}</td></tr><tr><th>Absent</th><td>${absentDays}</td></tr><tr><th>Present</th><td>${presentDays}</td></tr><tr><th>Attendance %</th><td>${percent}%</td></tr></table></div>`;
  const absentDates = records.filter(r=> r.absent.includes(found.roll)).map(r=> r.date);
  html += `<div style="margin-top:10px"><div class="muted">Absent Dates (${absentDates.length}):</div>${ absentDates.length ? '<ul style=\"margin:6px 0 0 18px">' + absentDates.map(d=>`<li>${d}</li>`).join('') + '</ul>' : '<div style=\"margin-top:6px;font-weight:700;color:green">None — All present</div>'}</div>`;
  reportContent.innerHTML = html;
  showView('reports');
}

function clearReport(){ document.getElementById('studentSearch').value=''; reportContent.innerHTML=''; }

function showView(v){
  document.getElementById('attendanceView').style.display = v==='attendance' ? 'block' : 'none';
  document.getElementById('reportsView').style.display = v==='reports' ? 'block' : 'none';
  document.getElementById('navAttendance').classList.toggle('active', v==='attendance');
  document.getElementById('navReports').classList.toggle('active', v==='reports');
}
