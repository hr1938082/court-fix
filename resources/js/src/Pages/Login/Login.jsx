import React, { memo, useContext, useEffect, useState } from "react";
import FullPageWrapper from "../../Components/Wrapper/FullPageWrapper";
import { styled } from "@mui/system";
import Box from "@mui/material/Box";
import Typography from "@mui/material/Typography";
import TextField from "@mui/material/TextField";
import Button from "@mui/material/Button";
import CircularProgress from "@mui/material/CircularProgress";
import InputAdornment from "@mui/material/InputAdornment";
import Tooltip from "@mui/material/Tooltip";
import IconButton from "@mui/material/IconButton";
import VisibilityIcon from "@mui/icons-material/Visibility";
import VisibilityOffIcon from "@mui/icons-material/VisibilityOff";
import Dialog from '@mui/material/Dialog';
import DialogContent from '@mui/material/DialogContent';
import DialogContentText from '@mui/material/DialogContentText';
import DialogTitle from '@mui/material/DialogTitle';
import { AuthContext } from "../../Providers/Auth/AuthProvider";
import { useNavigate, Navigate } from "react-router-dom";
import useAuthRequest from "../../Request/AuthRequest/useAuthRequest";

const Main = styled("div")(({ theme }) => ({
    position: "relative",
    display: "flex",
    height: "70vh",
    width: "70vw",
    boxShadow: "0 0 10px rgba(0,0,0,0.2)",
    borderRadius: 10,
    overflow: "hidden",
    [theme.breakpoints.down("sm")]: {
        flexDirection: "column",
        height: "100vh",
        width: "100vh",
        boxShadow: "none",
        borderRadius: 0,
    },
}));
const FormPanel = styled("div")(({ theme }) => ({
    height: "100%",
    width: "50%",
    display: "flex",
    justifyContent: "center",
    alignItems: "center",
    [theme.breakpoints.down("sm")]: {
        height: "50%",
        width: "100%",
    },
}));

const Slider = styled("div")(({ theme }) => ({
    height: "100%",
    width: "50%",
    display: "flex",
    flexDirection: "column",
    justifyContent: "center",
    alignItems: "center",
    padding: "0 30px",
    textAlign: "center",
    backgroundColor: theme.palette.primary.dark,
    [theme.breakpoints.down("sm")]: {
        height: "50%",
        width: "100%",
    },
}));

const Login = () => {
    const navigate = useNavigate();
    const {Login} = useAuthRequest();
    const { saveToken } = useContext(AuthContext);
    const defaultValidation = { error: false, helperText: "" };
    const [Values, setValues] = useState({
        email: "",
        password: "",
    });
    const [Validation, setValidation] = useState({
        email: defaultValidation,
        password: defaultValidation,
    });
    const [IsBTNLoading, setIsBTNLoading] = useState(false);
    const [PasswordVisibility, setPasswordVisibility] = useState(false);
    const [openDialog, setOpenDialog] = useState(false);


    const handleOpenDialog = () => setOpenDialog(true);

    const handleCloseDialog = () => setOpenDialog(false);

    const handleChange = (e) => {
        const { name, value } = e.target;
        setValues({ ...Values, [name]: value });
    };
    const handleSubmit = async (e) => {
        e.preventDefault();
        setIsBTNLoading(true);
        Login(Values).then(
            res => {
                if (res.token) {
                    saveToken(res.token);
                    setIsBTNLoading(false);
                    navigate('/admin')
                } else {console.log(res);
                    const message = res.message;
                    if (!message.hasOwnProperty('permission')) {
                        const email = message.hasOwnProperty('email') ? { error: true, helperText: message.email[0] } : defaultValidation
                        const password = message.hasOwnProperty('password') ? { error: true, helperText: message.password[0] } : defaultValidation
                        setValidation({ email, password });
                        setIsBTNLoading(false);
                    } else {
                        handleOpenDialog();
                        setIsBTNLoading(false);
                    }
                }
            }
        )
    };
    return (
        localStorage.getItem('CISessionToken') ? (
            <Navigate to="/admin" />
        ) : (
            <FullPageWrapper>
                <Main>
                    <Slider>
                        <Typography
                            variant="h4"
                            component="h1"
                            sx={{ color: "primary.contrastText" }}
                        >
                            Great to have you here!
                        </Typography>
                        <Box
                            sx={{ bgcolor: "primary.main", p: 2, borderRadius: 2 }}
                        >
                            <Typography sx={{ color: "primary.contrastText" }}>
                                Welcome to Admin panel of Court Innovation
                            </Typography>
                            <Typography sx={{ color: "primary.contrastText" }}>
                                You can Login now with your email and password
                            </Typography>
                        </Box>
                    </Slider>
                    <FormPanel>
                        <form onSubmit={handleSubmit}>
                            <Box sx={{ mx: 5 }}>
                                <Typography
                                    variant="h4"
                                    component="h1"
                                    sx={{
                                        color: "primary.main",
                                        mb: 3,
                                        textAlign: "center",
                                    }}
                                >
                                    Login
                                </Typography>
                                <TextField
                                    label="Email"
                                    name="email"
                                    value={Values.email}
                                    fullWidth
                                    sx={{ mb: 3 }}
                                    onChange={handleChange}
                                    error={Validation.email.error}
                                    helperText={Validation.email.helperText}
                                    autoFocus
                                />
                                <TextField
                                    label="Password"
                                    type={PasswordVisibility ? "text" : "password"}
                                    name="password"
                                    value={Values.password}
                                    onChange={handleChange}
                                    error={Validation.password.error}
                                    helperText={Validation.password.helperText}
                                    fullWidth
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
                                                        onClick={() =>
                                                            setPasswordVisibility(
                                                                !PasswordVisibility
                                                            )
                                                        }
                                                    >
                                                        {PasswordVisibility ? (
                                                            <VisibilityIcon />
                                                        ) : (
                                                            <VisibilityOffIcon />
                                                        )}
                                                    </IconButton>
                                                </Tooltip>
                                            </InputAdornment>
                                        ),
                                    }}
                                />
                                <Button type="submit" disabled={IsBTNLoading} variant="contained" fullWidth>
                                    {IsBTNLoading ? (
                                        <CircularProgress size={24} />
                                    ) : (
                                        "Login"
                                    )}
                                </Button>
                            </Box>
                        </form>
                    </FormPanel>
                </Main>
                <Dialog
                    open={openDialog}
                    onClose={handleCloseDialog}
                    aria-labelledby="alert-dialog-title"
                    aria-describedby="alert-dialog-description"
                >
                    <DialogTitle id="alert-dialog-title" sx={{color:'error.main', fontSize:30, textAlign: 'center'}}>
                        Unauthorized
                    </DialogTitle>
                    <DialogContent>
                        <DialogContentText id="alert-dialog-description">
                            Please Contact to support support@courtinnovation.com
                        </DialogContentText>
                    </DialogContent>
                </Dialog>
            </FullPageWrapper>
        )
    );
};

export default memo(Login);
