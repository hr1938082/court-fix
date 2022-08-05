import React, {memo, useContext} from 'react';
import DialogTitle from '@mui/material/DialogTitle';
import Dialog from '@mui/material/Dialog';
import DialogContent from '@mui/material/DialogContent';
import DialogContentText from '@mui/material/DialogContentText';
import { AuthContext } from '../../Providers/Auth/AuthProvider';

const FetchException = () => {
    const {Auth:{FetchException}, hideException} = useContext(AuthContext);
  return (
    <Dialog onClose={hideException} open={FetchException.status}>
        <DialogTitle sx={{color:'error.main'}}>Server has thrown an exception!!</DialogTitle>
        <DialogContent>
            <DialogContentText sx={{color:'error.light'}}>
                Type: {FetchException.type}
            </DialogContentText>
            <DialogContentText sx={{color:'error.light'}}>
                Message: {FetchException.message}
            </DialogContentText>
            <DialogContentText>
                Please Contact to Tech Support
            </DialogContentText>
        </DialogContent>
    </Dialog>
  )
}

export default memo(FetchException);
