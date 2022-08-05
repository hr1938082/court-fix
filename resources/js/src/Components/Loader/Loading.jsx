import React, {memo} from 'react';
import CircularProgress from '@mui/material/CircularProgress';
import Box from '@mui/material/Box';

const Loading = () => {
  return (
      <Box sx={{height:'calc(100vh - 81px)', width: '100%', display: 'flex', justifyContent:'center', alignItems:'center'}}>
        <CircularProgress size={50}/>
      </Box>
  )
}

export default memo(Loading);
