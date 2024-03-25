import React, { useEffect } from 'react'
import { useAuth } from './Auth'
import { useNavigate } from 'react-router-dom';

const Profile = () => {
const auth = useAuth();
const navigate = useNavigate();
const handleLogout = () => {
    auth.logout();
    navigate('/');
}
  return (
    <div className='content'>
        <h2>Welcome {auth.user}</h2>
        <button onClick={()=>handleLogout()}>Logout</button>
    </div>
  )
}

export default Profile