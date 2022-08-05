import React, { memo, useContext, useState } from 'react';
import LayoutWrapper from '../../Components/LayoutWrapper/LayoutWrapper';
import Sidebar from '../../Components/Sidebar/Sidebar';
import SidebarData from './SidebarData';
import { Navigate } from 'react-router-dom';
import SectionDrawer from '../../Components/Section/SectionDrawer';

const Main = () => {
    const [OpenBackdrop, setOpenBackdrop] = useState(true);
    const handleBackdrop = () => {
        setOpenBackdrop(!OpenBackdrop);
    }
    return (
        localStorage.getItem('CISessionToken') ? (
            <LayoutWrapper>
                <Sidebar data={SidebarData} handleBackdrop={handleBackdrop} />
                {/* <Aside /> */}
                <SectionDrawer open={OpenBackdrop} />
                {/* <Section open={OpenBackdrop} /> */}
            </LayoutWrapper>
        ) : <Navigate to="/admin/login" />

    )
}

export default memo(Main);
