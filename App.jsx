import React ,{ useState } from 'react'
import './App.css'
import EmployeeList from './components/EmployeeList'
import EmployeeModal from './components/EmployeeModal'
import Engine from './components/Engine'

function App() {
  const {
    employees, isOpen, currentEmployee,
    openModal, closeModal,
    addOnUpdateEmployee, deleteEmployee,
  } = Engine();

  return (
    <>
      <div className="App">
        <h1>ข้อมูลพนักงาน</h1>
        <button onClick={()=>openModal(null)}>เพิ่มข้อมูลพนักงาน</button>
        <EmployeeList
          employees={employees}
          openModal={openModal}
          deleteEmployee={deleteEmployee}
          />
        <EmployeeModal
          isOpen={isOpen}
          closeModal={closeModal}
          currentEmployee={currentEmployee}
          addOnUpdateEmployee={addOnUpdateEmployee}
        />
        
      </div>
    </>
  )
}

export default App
