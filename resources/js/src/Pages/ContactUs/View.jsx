import { TextField } from '@mui/material';
import { Box } from '@mui/material';
import React, { memo } from 'react'
import { useLocation } from 'react-router-dom';
import BasicWrapper from '../../Components/Wrapper/BasicWrapper';
import FromWrapper from '../../Components/Wrapper/FromWrapper';

const View = () => {
    const {state} = useLocation();
  return (
      <BasicWrapper>
          <FromWrapper title="Contact Us">
              <Box sx={{display:'flex', justifyContent:'space-between', mb:2}}>
                  <TextField label="Name" inputProps={{readOnly:true}} value={state.name} sx={{width:"49%"}}/>
                  <TextField label="Email" inputProps={{readOnly:true}} value={state.email} sx={{width:"49%"}}/>
              </Box>
              <TextField label="Message" inputProps={{readOnly:true}} value={state.message} fullWidth multiline rows={7}/>
          </FromWrapper>
      </BasicWrapper>
  )
}

export default memo(View);
