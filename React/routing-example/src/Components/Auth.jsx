import React, { createContext, useContext, useState } from 'react'

const AuthContext = createContext();

export const AuthProvider = ({children}) => {
    const [user, SetUser] = useState(null)

    const login = user => SetUser(user)
    const logout = () => SetUser(null)
    const isLoggedIn = () => user ? true : false

  return (
    <AuthContext.Provider value={{user,login,logout, isLoggedIn}}>
        {children}
    </AuthContext.Provider>
  )
}

export const useAuth = () => {
    return useContext(AuthContext);
}


