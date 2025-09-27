import React from 'react'
import { NavLink } from 'react-router-dom'
import "./Menu.css"

function Menu() {
  return (
    <nav className='menu'>
        <NavLink to="/usestate" >useState</NavLink>
        <NavLink to="/useeffect" >useEffect</NavLink>
        <NavLink to="/usecontext" >useContext</NavLink>
        <NavLink to="/usereducer" >useReducer</NavLink>
        <NavLink to="/useref" >useRef</NavLink>
        <NavLink to="/usememo" >useMemo</NavLink>
        <NavLink to="/usecallback" >useCallback</NavLink>
    </nav>
  )
}

export default Menu