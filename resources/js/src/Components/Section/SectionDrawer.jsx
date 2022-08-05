import React from 'react';
import PropTypes from 'prop-types'
import { styled } from '@mui/system';
import Backdrop from '@mui/material/Backdrop';
import SectionNavigation from './SectionNavigation/SectionNavigation';
import { Outlet } from 'react-router-dom';
import FetchException from '../FetchException/FetchException';
import Alert from '../Alert/Alert';

const SectionWidth = '240px';

const closedMixin = (theme) => ({
    width: `calc(100vw - ${SectionWidth} + 1px)`,
    transition: theme.transitions.create('width', {
        easing: theme.transitions.easing.sharp,
        duration: theme.transitions.duration.leavingScreen,
    }),
});
const openedMixin = (theme) => ({
    transition: theme.transitions.create('width', {
        easing: theme.transitions.easing.sharp,
        duration: theme.transitions.duration.enteringScreen,
    }),
    width: `calc(100vw - (${theme.spacing(7)} + 1px))`,
    marginLeft: `calc(${theme.spacing(7)} + 1px)`,
    [theme.breakpoints.up('sm')]: {
        width: `calc(100vw - (${theme.spacing(8)} + 1px))`,
    },
});

const Box = styled('div', { shouldForwardProp: (prop) => prop !== 'open' })(
    ({ theme, open }) => ({
        height:'100vh',
        overflow:'auto',
        position:'fixed',
        top:0,
        right:0,
        width: SectionDrawer,
        background: theme.palette.background.paper,
        borderRight: `1px solid ${theme.palette.background.default}`,
        ...(!open && {
          ...openedMixin(theme),
        }),
        ...(open && {
          ...closedMixin(theme),
        }),
    })
);


const SectionDrawer = (props) => {
    const { open } = props;
    return (
        <Box open={open}>
            <SectionNavigation />
            <Outlet />
            {/* <Backdrop open={open} /> */}
            <FetchException />
            <Alert />
        </Box>
    )
}


SectionDrawer.propTypes = {
    open: PropTypes.bool.isRequired,
}

export default SectionDrawer
