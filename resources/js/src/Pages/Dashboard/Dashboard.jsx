import React, { memo, useCallback, useEffect, useState } from 'react';
import DashboardCard from '../../Components/DashboardCard/DashboardCard';
import BasicWrapper from '../../Components/Wrapper/BasicWrapper';
import HorizontalCenterWrapper from '../../Components/Wrapper/HorizontalCenterWrapper';
import useUserRequest from '../../Request/UserRequest/useUserRequest';
import CircularProgress from '@mui/material/CircularProgress';
import useCoursesRequest from '../../Request/CoursesRequest/useCoursesRequest';
import PersonOutlineOutlinedIcon from '@mui/icons-material/PersonOutlineOutlined';
import SchoolIcon from '@mui/icons-material/School';

const Dashboard = () => {
    const { totalUsers } = useUserRequest();
    const { totalCourses } = useCoursesRequest();
    const [TotalUser, setTotalUser] = useState(null);
    const [TotalCourses, setTotalCourses] = useState(null);
    const [IsLoading, setIsLoading] = useState(false);
    const getData = useCallback(
        () => {
            totalUsers().then(res => {
                setTotalUser(res);
                totalCourses().then(res=>{
                    setTotalCourses(res)
                    setIsLoading(false);
                })
            });
        },
        [],
    )
    useEffect(() => {
        setIsLoading(true);
        getData();
    }, [])


    return (
        IsLoading ? (
            <BasicWrapper>
                <CircularProgress size={50} />
            </BasicWrapper>
        ) : (
            <div>
                <HorizontalCenterWrapper>
                    <DashboardCard color="primary.main" icon={<PersonOutlineOutlinedIcon fontSize='inherit' />} title="Total Users" text={TotalUser} />
                    <DashboardCard color="secondary.main" icon={<SchoolIcon fontSize='inherit' />} title="Total Courses" text={TotalCourses} />
                    <DashboardCard color="success.main" icon={<PersonOutlineOutlinedIcon fontSize='inherit' />} title="Total Users" text="200" />
                    <DashboardCard color="info.main" icon={<PersonOutlineOutlinedIcon fontSize='inherit' />} title="Total Users" text="200" />
                </HorizontalCenterWrapper>
                <HorizontalCenterWrapper>
                    <DashboardCard color="error.main" icon={<PersonOutlineOutlinedIcon fontSize='inherit' />} title="Total Users" text="200" />
                    <DashboardCard color="warning.main" icon={<PersonOutlineOutlinedIcon fontSize='inherit' />} title="Total Users" text="200" />
                    <DashboardCard color="black" icon={<PersonOutlineOutlinedIcon fontSize='inherit' />} title="Total Users" text="200" />
                </HorizontalCenterWrapper>

            </div>
        )
    )
}

export default memo(Dashboard)
