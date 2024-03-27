import React, { useState } from 'react'
import ChildComponent from './ChildComponent';
import { MainContext } from './MainContext';

const SuperUser = () => {
    const [user, setUser] = useState('Mangesh');
    const [pi, setPi] = useState(3.14);
    const [mood, setMood] = useState('Good');

    const handleValueChange = (e, valueType) => {
        switch(valueType) {
        case 'user' :
            setUser( e.target.value );
            break;
        case 'pi' :
            setPi( e.target.value );
            break;
        case 'mood':
            setMood( e.target.value );
            break;
        default:
            break;
        }
    }

  return (
    <MainContext.Provider value={[user,pi,mood]} >
        <input style={{'margin':'15px'}} type='text' onChange={(e)=>handleValueChange(e, 'user')} value={user} placeholder='Update User'/>
        <input style={{'margin':'15px'}} type='number' onChange={(e)=>handleValueChange(e, 'pi')} value={pi} placeholder='Update PI value'/>
        <input style={{'margin':'15px'}} type='text' onChange={(e)=>handleValueChange(e, 'mood')} value={mood} placeholder='Update Mood'/>
        <hr />
        <ChildComponent />
    </MainContext.Provider>
  )
}

export default SuperUser