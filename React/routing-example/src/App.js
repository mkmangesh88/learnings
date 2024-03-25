import { Link, Route, BrowserRouter , Routes } from 'react-router-dom';
import Home from './Components/Home';
import Contacts from './Components/Contacts';
import "./App.css";
import React from 'react';
import Profile from './Components/Profile';
import NoMatch from './Components/NoMatch';
import { AuthProvider, useAuth } from './Components/Auth';
import Login from './Components/Login';
import { RequireAuth } from './Components/RequireAuth';

const LazyAbout = React.lazy(()=>import('./Components/About'));

function App() {
    return (
        <BrowserRouter> 
        <AuthProvider>
        <div className="App">
                    <ul className="App-header">
                        <li>
                            <Link to="/">Home</Link>
                        </li>
                        <li>
                            <Link to="/about">
                                About
                            </Link>
                        </li>
                        <li>
                            <Link to="/contact">
                                Contact Us
                            </Link>
                        </li>
                        <li>
                            <Link to="/profile">
                                Profile
                            </Link>
                        </li>
                          <li>
                              <Link to="/login">
                                  Login
                              </Link>
                          </li>
                    </ul>
          <Routes>
            <Route path="/" element = {<Home />} />
            <Route path="/about" element = {
               <React.Suspense fallback={<>Loading...</>}>
               <LazyAbout />
             </React.Suspense>
            } />
            <Route path="/contact" element = {<Contacts />} />
            <Route path="/profile" element = {
              <RequireAuth>
                <Profile />
              </RequireAuth>} />
            <Route path="/login" element = {<Login />} />
            <Route path='*' element = {<NoMatch/>} />
          </Routes>
        </div>
        </AuthProvider>
      </BrowserRouter>
    );
}

export default App;
