import { memo, useContext, useState } from 'react';
import Snackbar from '@mui/material/Snackbar';
import {default as MUIAlert} from '@mui/material/Alert';
import { AuthContext } from '../../Providers/Auth/AuthProvider';

const Alert = () => {
    const {Alert, hideAlert} = useContext(AuthContext);
    return (
        <Snackbar sx={{top:{xl:90,lg:90,md:90,sm:90,xs:90}}} anchorOrigin={{ vertical:'top', horizontal:'right' }} open={Alert.open} autoHideDuration={Alert.HideDuration} onClose={hideAlert}>
            <MUIAlert onClose={hideAlert} severity={Alert.serverity} sx={{ width: '100%' }}>
                {Alert.message}
            </MUIAlert>
        </Snackbar>
    )
}

export default memo(Alert);
