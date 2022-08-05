import React, {memo} from 'react';
import PropTypes from 'prop-types'
import { styled } from '@mui/system';
import Backdrop from '@mui/material/Backdrop';
import SectionNavigation from './SectionNavigation/SectionNavigation';
import {Outlet} from 'react-router-dom';
import FetchException from '../FetchException/FetchException';
import Alert from '../Alert/Alert';

const Box = styled('div')(({theme})=>({
    width: `calc(100vw - (${theme.spacing(7)} + 1px))`,
    background: theme.palette.background.default,
    borderRight:`1px solid ${theme.palette.background.paper}`,
    marginLeft: `calc(${theme.spacing(7)} + 1px)`,
    [theme.breakpoints.up('sm')]:{
        width: `calc(100vw - (${theme.spacing(8)} + 1px))`,
        marginLeft: `calc((${theme.spacing(8)} + 1px))`,
    },
}));

const Section = (props) => {
    const { open } = props;
  return (
      <Box>
          <SectionNavigation/>
            <Outlet/>
          <Backdrop open={open}/>
          <FetchException/>
          <Alert/>
      </Box>
  )
}

Section.propTypes = {
    open: PropTypes.bool.isRequired,
}

export default memo(Section);
