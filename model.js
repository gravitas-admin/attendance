// Data and setup
const DATA = {
  batches: [{id:'A',name:'Batch A'},{id:'B',name:'Batch A'},{id:'C',name:'Batch A'}],
  teachers: [
    {id:1,name:'Teacher 1',subject:'Mathematics',batches:['A']},
    {id:2,name:'Teacher 2',subject:'Science',batches:['A']},
    {id:3,name:'Teacher 3',subject:'English',batches:['A']},
    {id:4,name:'Teacher 4',subject:'History',batches:['A']},
    {id:5,name:'Teacher 5',subject:'Computer',batches:['A']}
  ]
};

// students
const STUDENTS_BY_BATCH = {};
DATA.batches.forEach(b=>{
  const arr=[];
  for(let i=1;i<=10;i++) arr.push({roll:i,name:`${b.name} Student ${i}`});
  STUDENTS_BY_BATCH[b.id]=arr;
});

// attendance history stored in localStorage key
const STORAGE_KEY = 'sca_attendance_history_v1'; // backend will replace this storage
function loadHistory(){ try { return JSON.parse(localStorage.getItem(STORAGE_KEY)||'[]'); } catch(e){ return []; } }
function saveHistory(hist){ localStorage.setItem(STORAGE_KEY, JSON.stringify(hist)); }

// app state
let state = {
  teacherId: DATA.teachers[0].id,
  batchId: DATA.teachers[0].batches[0],
  date: new Date().toISOString().slice(0,10),
  attendance: {} // roll -> 'present'|'absent'
};
