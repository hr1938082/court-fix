import React, { forwardRef, memo, useImperativeHandle, useState } from 'react';
import DialogTitle from '@mui/material/DialogTitle';
import Dialog from '@mui/material/Dialog';
import Box from '@mui/material/Box';
import TextField from '@mui/material/TextField';
import Button from '@mui/material/Button';
import useAuthRequest from '../../Request/AuthRequest/useAuthRequest';
import CircularProgress from '@mui/material/CircularProgress';
import InputAdornment from '@mui/material/InputAdornment';
import Tooltip from '@mui/material/Tooltip';
import IconButton from '@mui/material/IconButton';
import VisibilityIcon from "@mui/icons-material/Visibility";
import VisibilityOffIcon from "@mui/icons-material/VisibilityOff";

const VerifyItsYou = forwardRef(({ setVerify }, ref) => {
    const defaultValidation = { error: false, helperText: "" };
    const { verifyUser } = useAuthRequest();
    const [Open, setOpen] = useState(false);
    const [Password, setPassword] = useState("");
    const [PasswordVisibility, setPasswordVisibility] = useState(false);
    const [Validation, setValidation] = useState(defaultValidation);
    const [IsBtnLoading, setIsBtnLoading] = useState(false);
    useImperativeHandle(ref, () => ({
        handleOpen
    }));
    const handleOpen = () => {
        setOpen(true);
    }
    const handleClose = () => {
        if (IsBtnLoading) {
            return
        }
        setOpen(false)
        setPassword("");
    };

    const handleChange = (e) => {
        setPassword(e.target.value);
    }

    const handleSubmit = (e) => {
        e.preventDefault();
        setIsBtnLoading(true);
        const data = {
            password: Password
        }
        verifyUser(data).then(res => {
            if (!res.hasOwnProperty('message')) {
                setIsBtnLoading(false);
                setOpen(false);
                setPassword("");
                setVerify(true);
            } else {
                const message = res.message
                const password = message.hasOwnProperty('password') ? { error: true, helperText: message.password[0] } : defaultValidation
                setValidation(password);
                setIsBtnLoading(false);
            }
        });
    }

    return (
        <Dialog onClose={handleClose} open={Open} sx={{ '& .MuiDialog-paper': { width: 400 } }}>
            <DialogTitle color="primary">Verify Its You</DialogTitle>
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
                            IsBtnLoading ? <CircularProgress size={24} /> : "Verify"
                        }
                    </Button>
                </form>
            </Box>
        </Dialog>
    )
})

export default memo(VerifyItsYou)
