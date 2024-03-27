import React, { useContext } from 'react'
import { MainContext } from './MainContext'

const LeafComponent = () => {
    const [user, pi, mood]  = useContext(MainContext);
  return (
    <>
    <div>This is Leaf Component saying</div>
    <div>User name is <strong>{user} </strong> who says value of Pi is <strong>{pi}</strong> while he was in a <strong>{mood}</strong> mood.</div>
    </>
  )
}

export default LeafComponent