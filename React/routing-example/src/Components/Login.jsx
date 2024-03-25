import React, { useEffect, useState } from 'react'
import { useAuth } from './Auth'
import { useNavigate } from 'react-router-dom'

const Login = () => {
    const auth = useAuth()
    const [user, SetUser] = useState('')
    const navigate = useNavigate();

    useEffect(()=>{
        if(auth.user) {
            navigate('/');
        }
    },[])
    const handleLogin = () => {
        auth.login(user)
        navigate('/')
    }
  return (
    <div className='content'>
        <div className='login-box'>
            <input type = 'text' onChange={(e)=> SetUser(e.target.value)} placeholder='Enter username'/>
            <button onClick={()=>handleLogin()} >Login</button>
        </div>
    </div>
  )
}

export default Login