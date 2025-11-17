// handlers
function onTeacherChange(e){ renderForTeacher(Number(e.target.value)); }
function onBatchChange(e){ state.batchId = e.target.value; resetAttendance(); renderStudents(); updateSummary(); }
function onDateChange(e){ state.date = e.target.value; }

// toggle
function toggleAbsent(e){
  const el = e.currentTarget || e.target.closest('.toggle-switch');
  const roll = Number(el.dataset.roll);
  state.attendance[roll] = state.attendance[roll]==='absent' ? 'present' : 'absent';
  applyAttendanceUI();
  updateSummary();
}

// confirm save to localStorage (placeholder for backend)
function confirmSubmit(){
  const teacherId = state.teacherId;
  const batchId = state.batchId;
  const date = attDate.value || state.date;
  const absent = Object.entries(state.attendance).filter(([r,v])=>v==='absent').map(([r])=>Number(r));
  const hist = loadHistory();
  hist.push({teacherId,batchId,date,absent});
  saveHistory(hist);
  closeModal();
  alert('Attendance saved locally (demo). Backend endpoint: POST /attendance (payload teacherId,batchId,date,absent array)');
  // after save keep data (do not reset) and update reports
  updateSummary();
}

// reset
function resetAll(){ if(!confirm('Reset all marks to Present?')) return; resetAttendance(); renderStudents(); updateSummary(); }

// export CSV of today's attendance for selected teacher/batch
function exportAttendanceCSV(){
  const t = DATA.teachers.find(x=>x.id===state.teacherId);
  const batch = state.batchId;
  const date = attDate.value || state.date;
  const students = STUDENTS_BY_BATCH[batch]||[];
  const rows = [['Roll','Name','Status']];
  students.forEach(s=> rows.push([s.roll,s.name, state.attendance[s.roll] || 'present']));
  const csv = rows.map(r=> r.map(c=> `"${String(c).replace(/"/g,'""')}"`).join(',')).join('\n');
  const blob = new Blob([csv],{type:'text/csv'}); const url = URL.createObjectURL(blob);
  const a = document.createElement('a'); a.href = url; a.download = `attendance_${batch}_${date}.csv`; document.body.appendChild(a); a.click(); a.remove(); URL.revokeObjectURL(url);
}

function downloadBatchReport(){ downloadBatchReport_impl(); }
function downloadBatchReport_impl(){
  const batchId = state.batchId;
  const hist = loadHistory();
  const students = STUDENTS_BY_BATCH[batchId]||[];
  const rows = [['Roll','Name','TotalDays','AbsentDays','PresentDays','Attendance%']];
  students.forEach(s=>{
    const records = hist.filter(h=>h.batchId===batchId);
    const totalDays = records.length;
    const absentDays = records.filter(r=> r.absent.includes(s.roll) ).length;
    const presentDays = totalDays - absentDays;
    const percent = totalDays ? Math.round((presentDays/totalDays)*100) : 100;
    rows.push([s.roll,s.name,totalDays,absentDays,presentDays,percent+'%']);
  });
  const csv = rows.map(r=> r.map(c=> `"${String(c).replace(/"/g,'""')}"`).join(',')).join('\n');
  const blob = new Blob([csv],{type:'text/csv'}); const url = URL.createObjectURL(blob);
  const a = document.createElement('a'); a.href = url; a.download = `batch_report_${batchId}.csv`; document.body.appendChild(a); a.click(); a.remove(); URL.revokeObjectURL(url);
}
