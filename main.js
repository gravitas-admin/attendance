function init(){
  // teacher select
  DATA.teachers.forEach(t=>{
    const opt=document.createElement('option'); 
    opt.value=t.id;
     opt.textContent=`${t.name} — ${t.subject}`;
      teacherSelect.appendChild(opt);
  });

  attDate.value = state.date;
  todayDateEl.textContent = new Date().toLocaleDateString();

  // listeners
  teacherSelect.addEventListener('change', onTeacherChange);
  batchSelect.addEventListener('change', onBatchChange);
  attDate.addEventListener('change', onDateChange);
  document.getElementById('studentSearch').addEventListener('keydown',(e)=>{ if(e.key==='Enter') generateReport(); });
  
  // initial render
  renderForTeacher(state.teacherId);
}

document.addEventListener('DOMContentLoaded',()=>{
  init();
  attDate.value = new Date().toISOString().slice(0,10);
  state.date = attDate.value;
  updateSummary();
});
