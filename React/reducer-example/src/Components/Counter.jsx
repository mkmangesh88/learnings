import React from 'react'
import { useReducer } from 'react'
import './../App.css'

const initialState = {
    count: 0
}

const reducer = (state, action) => {
    switch(action.type) {
        case 'INC': 
                return {count: state.count+1};
        case 'DEC': 
                return {count:state.count-1};
        default: 
                return{count:state.count};
    }
}

const Counter = () => {
    const [state, dispatch] = useReducer(reducer, initialState);
  return (
    <div className='counter-box'>
        <button className='counter-button' onClick={()=>dispatch({type:'DEC'})}>-</button>
        <span className='counter-display'>{state.count}</span>
        <button className='counter-button' onClick={()=>dispatch({type:'INC'})}>+</button>
    </div>
  )
}

export default Counter