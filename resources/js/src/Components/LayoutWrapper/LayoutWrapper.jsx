import React, { memo } from 'react';
import PropTypes from 'prop-types';
import Box from '@mui/material/Box';

const LayoutWrapper = (props) => {
    const {children} = props;
  return (
      <Box sx={{ width:'100vw'}}>
          {children}
      </Box>
  )
}

LayoutWrapper.propTypes = {
    children: PropTypes.node.isRequired
}

export default memo(LayoutWrapper);
