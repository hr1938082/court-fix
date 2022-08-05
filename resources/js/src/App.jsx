import React, { memo, lazy } from 'react';
import ThemeProvider from '@mui/material/styles/ThemeProvider';
import { lightTheme } from './Theme.config';
import Main from './Layouts/Main/Main';
import { Routes, Route } from 'react-router-dom';
import Loader from './Components/Loader/Loader';
import AuthProvider, { AuthContext } from './Providers/Auth/AuthProvider';

// lazy imports start

// login
const Login = lazy(() => import('./Pages/Login/Login'));

// dashboard
const Dashboard = lazy(() => import('./Pages/Dashboard/Dashboard'));

// profile
const Profile = lazy(() => import('./Pages/Profile/Profile'));

// users
const Users = lazy(() => import('./Pages/Users/Users'));
const UserForm = lazy(() => import('./Pages/Users/Form'));

// courses
const Courses = lazy(() => import('./Pages/Courses/Courses'));
const CourseForm = lazy(() => import('./Pages/Courses/Form'));

// contact us
const ContactUs = lazy(()=> import('./Pages/ContactUs/ContactUs'));
const ContactUsView = lazy(()=> import('./Pages/ContactUs/View'));

// lazy imports end

const App = () => {

    return (
        <AuthContext.Provider value={AuthProvider()}>
            <ThemeProvider theme={lightTheme}>
                <Routes>
                    <Route path='admin/login' element={<Loader element={<Login />} />} />
                    <Route path='admin' element={<Main />}>
                        <Route index element={<Loader element={<Dashboard />} />} />
                        <Route path="profile" element={<Loader element={<Profile />} />} />
                        <Route path='users' >
                            <Route index element={<Loader element={<Users />} />} />
                            <Route path='create' element={<Loader element={<UserForm />} />} />
                            <Route path='view/:name' element={<Loader element={<UserForm />} />} />
                        </Route>
                        <Route path='courses'>
                            <Route index element={<Loader element={<Courses />} />} />
                            <Route path='create' element={<Loader element={<CourseForm />} />} />
                            <Route path='edit/:title' element={<Loader element={<CourseForm />} />} />
                        </Route>
                        <Route path='contact.us'>
                            <Route index element={<Loader element={<ContactUs />} />} />
                            <Route path='view/:name' element={<Loader element={<ContactUsView />} />} />
                        </Route>
                    </Route>
                </Routes>
            </ThemeProvider>
        </AuthContext.Provider>
    )
}

export default memo(App)
