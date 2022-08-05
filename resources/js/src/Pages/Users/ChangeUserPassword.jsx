import React, { memo, useContext, useState } from 'react';
import Dialog from '@mui/material/Dialog';
import DialogTitle from '@mui/material/DialogTitle';
import Box from '@mui/material/Box';
import TextField from '@mui/material/TextField';
import Button from '@mui/material/Button';
import InputAdornment from '@mui/material/InputAdornment';
import Tooltip from '@mui/material/Tooltip';
import IconButton from '@mui/material/IconButton';
import VisibilityIcon from "@mui/icons-material/Visibility";
import VisibilityOffIcon from "@mui/icons-material/VisibilityOff";
import CircularProgress from '@mui/material/CircularProgress';
import useUserRequest from '../../Request/UserRequest/useUserRequest';
import { AuthContext } from '../../Providers/Auth/AuthProvider';

const ChangeUserPassword = (props) => {
    const {showAlert} = useContext(AuthContext);
    const {Open, setOpen, id, setIdNull} = props;
    const {changeUserPassword} = useUserRequest();
    const defaultValidation = {error:false, helperText:""};
    const [Password, setPassword] = useState("");
    const [PasswordVisibility, setPasswordVisibility] = useState(false);
    const [Validation, setValidation] = useState(defaultValidation);
    const [IsBtnLoading, setIsBtnLoading] = useState(false);

    const handleClose = () => {
        if (IsBtnLoading) {
            return
        }

        setOpen(false);
        setIdNull(null);
        setPassword("");
    };

    const handleChange = (e) => {
        const value = e.target.value;
        setPassword(value);
    }

    const handleSubmit = (e) => {
        e.preventDefault();
        setIsBtnLoading(true);
        const data = {
            id,
            password:Password
        }
        changeUserPassword(data).then(res=>{
            if (!res.hasOwnProperty('message')) {
                setIsBtnLoading(false);
                showAlert('success', 'Password has been changed');
                setOpen(false);
                setIdNull(null);
                setPassword("");
            }else{
                const message = res.message;
                const password = message.hasOwnProperty('password') ? {error:true, helperText:message.password[0]} : defaultValidation;
                setValidation(password);
                setIsBtnLoading(false);
            }
        });
    }
  return (
    <Dialog onClose={handleClose} open={Open} sx={{ '& .MuiDialog-paper': { width: 400 } }}>
        <DialogTitle color="primary">Change Password</DialogTitle>
            <Box px={3} pb={2}>
                <form onSubmit={handleSubmit}>
                    <TextField
                        label="Password"
                        type={PasswordVisibility ? "text" : "password"}
                        value={Password}
                        onChange={handleChange}
                        error={Validation.error}
                        helperText={Validation.helperText}
                        fullWidth
                        size='small'
                        sx={{ mb: 2 }}
                        InputProps={{
                            endAdornment: (
                                <InputAdornment position="end">
                                    <Tooltip
                                        title={
                                            PasswordVisibility
                                                ? "Hide Password"
                                                : "Show Password"
                                        }
                                        arrow
                                    >
                                        <IconButton
                                            size='small'
                                            onClick={() =>
                                                setPasswordVisibility(
                                                    !PasswordVisibility
                                                )
                                            }
                                        >
                                            {PasswordVisibility ? (
                                                <VisibilityIcon fontSize='small' />
                                            ) : (
                                                <VisibilityOffIcon fontSize='small' />
                                            )}
                                        </IconButton>
                                    </Tooltip>
                                </InputAdornment>
                            ),
                        }}
                    />
                    <Button type="submit" disabled={IsBtnLoading} variant='contained' fullWidth>
                        {
                            IsBtnLoading ? <CircularProgress size={24} /> : "Submit"
                        }
                    </Button>
                </form>
            </Box>
    </Dialog>
  )
}

export default memo(ChangeUserPassword)
