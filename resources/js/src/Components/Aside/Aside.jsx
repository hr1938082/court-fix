import React, { memo } from 'react';
import Box from '@mui/material/Box';
import { styled } from '@mui/system';
import AsideNavigation from './AsideNavigation/AsideNavigation';

const StyledBox = styled(Box)(({theme})=>({
  height:'100vh',
  width:'300px',
  position: 'fixed',
  right: 0,
  top:0,
  backgroundColor: theme.palette.background.default,
  [theme.breakpoints.down('lg')]:{
    display: 'none'
  },
})); 

const Aside = () => {
  return (
      <StyledBox>
        <AsideNavigation/>
      </StyledBox>
  )
}

export default memo(Aside)