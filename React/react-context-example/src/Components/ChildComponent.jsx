import React, { useContext } from 'react'
import { MainContext } from './MainContext';
import LeafComponent from './LeafComponent';


const ChildComponent = () => {
    const [user,pi, mood] = useContext( MainContext );
  return (
    <div>
    <span>This is Child Component saying......</span>
    <div>User name is <strong>{user} </strong> who says value of Pi is <strong>{pi}</strong> while he was in a <strong>{mood}</strong> mood.</div>
    <hr/>
    <LeafComponent />
    </div>
  )
}

export default ChildComponent