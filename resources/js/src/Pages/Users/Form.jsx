import React, { memo, useContext, useEffect, useState } from "react";
import BasicWrapper from "../../Components/Wrapper/BasicWrapper";
import FromWrapper from "../../Components/Wrapper/FromWrapper";
import TextField from "@mui/material/TextField";
import Tooltip from "@mui/material/Tooltip";
import IconButton from "@mui/material/IconButton";
import InputAdornment from "@mui/material/InputAdornment";
import VisibilityIcon from "@mui/icons-material/Visibility";
import VisibilityOffIcon from "@mui/icons-material/VisibilityOff";
import Button from '@mui/material/Button';
import useUserRequest from "../../Request/UserRequest/useUserRequest";
import CircularProgress from "@mui/material/CircularProgress";
import { AuthContext } from "../../Providers/Auth/AuthProvider";
import { useLocation, useNavigate } from "react-router-dom";
import Box from '@mui/material/Box';
import Avatar from "@mui/material/Avatar";
import { baseURL } from "../../Constants";


const Form = () => {
    const {state} = useLocation();
    const navigate = useNavigate();
    const { create } = useUserRequest();
    const defaultValidation = { error: false, helperText: "" };
    const { showAlert } = useContext(AuthContext);
    const [Values, setValues] = useState({
        id: "",
        name: "",
        role:"",
        jurisdiction:"",
        email: "",
        phone_number:"",
        password: "",
        image: ""
    });
    const [Validation, setValidation] = useState({
        name: defaultValidation,
        role:defaultValidation,
        jurisdiction:defaultValidation,
        email: defaultValidation,
        phone_number:defaultValidation,
        password: defaultValidation,
    });
    const [IsBTNLoading, setIsBTNLoading] = useState(false);
    const [PasswordVisibility, setPasswordVisibility] = useState(false);

    useEffect(() => {
        if (state) {
            setValues({
                id:state.id,
                name:state.name,
                role:state.role,
                jurisdiction:state.jurisdiction,
                email:state.email,
                phone_number:state.phone_number,
                image:state.images ? baseURL+'/image/'+state.images : ""
            })
        }
    }, [])


    const handleChange = (e) => {
        const { name, value } = e.target;
        setValues({ ...Values, [name]: value });
    };

    const handleSubmit = (e) => {
        e.preventDefault();
        setIsBTNLoading(true);
        const response = (res) => {
            if (!res.hasOwnProperty('message')) {
                showAlert('success', "User Created Successfully")
                navigate('/admin/users');
            } else {
                const message = res.message;
                const name = message.hasOwnProperty('name') ? { error: true, helperText: message.name[0] } : defaultValidation;
                const role = message.hasOwnProperty('role') ? { error: true, helperText: message.role[0] } : defaultValidation;
                const jurisdiction = message.hasOwnProperty('jurisdiction') ? { error: true, helperText: message.jurisdiction[0] } : defaultValidation;
                const email = message.hasOwnProperty('email') ? { error: true, helperText: message.email[0] } : defaultValidation;
                const phone_number = message.hasOwnProperty('phone_number') ? { error: true, helperText: message.phone_number[0] } : defaultValidation;
                const password = message.hasOwnProperty('password') ? { error: true, helperText: message.password[0] } : defaultValidation;
                setValidation({
                    name,
                    role,
                    jurisdiction,
                    email,
                    phone_number,
                    password
                });
                setIsBTNLoading(false);
            }
        }
        create(Values).then(res => response(res))
    }
    return (
        <BasicWrapper>
            <FromWrapper title={Values.id ? "View" : "Create"}>
                {
                    Values.id && (
                        <Box sx={{display:'flex', justifyContent:'center',mb:2}}>
                            <Box sx={{height:170,width:170,borderRadius:'50%',overflow:'hidden', boxShadow:'0 0 10px rgba(0,0,0,.2)'}}>
                                {
                                    Values.image ?  (
                                        <img src={Values.image} height={170} width={170} alt="user" />
                                    ):(
                                        <Avatar sx={{height:170, width:170}}/>
                                    )
                                }
                            </Box>
                        </Box>
                    )
                }
                <form onSubmit={handleSubmit}>
                    <TextField
                        label="Name"
                        name="name"
                        sx={{ mb: 2 }}
                        InputProps={{ disabled: Values.id ? true : false, readOnly: Values.id ? true : false }}
                        value={Values.name}
                        onChange={handleChange}
                        error={Validation.name.error}
                        helperText={Validation.name.helperText}
                        fullWidth
                    />
                    <TextField
                        label="Role"
                        name="role"
                        sx={{ mb: 2 }}
                        InputProps={{ disabled: Values.id ? true : false, readOnly: Values.id ? true : false }}
                        value={Values.role}
                        onChange={handleChange}
                        error={Validation.role.error}
                        helperText={Validation.role.helperText}
                        fullWidth
                    />
                    <TextField
                        label="Jurisdiction"
                        name="jurisdiction"
                        sx={{ mb: 2 }}
                        InputProps={{ disabled: Values.id ? true : false, readOnly: Values.id ? true : false }}
                        value={Values.jurisdiction}
                        onChange={handleChange}
                        error={Validation.jurisdiction.error}
                        helperText={Validation.jurisdiction.helperText}
                        fullWidth
                    />
                    <TextField
                        label="Email"
                        name="email"
                        sx={{ mb: 2 }}
                        InputProps={{ disabled: Values.id ? true : false, readOnly: Values.id ? true : false }}
                        value={Values.email}
                        onChange={handleChange}
                        error={Validation.email.error}
                        helperText={Validation.email.helperText}
                        fullWidth
                    />
                    <TextField
                        label="Phone Number"
                        name="phone_number"
                        sx={{ mb: 2 }}
                        InputProps={{ disabled: Values.id ? true : false, readOnly: Values.id ? true : false }}
                        value={Values.phone_number}
                        onChange={handleChange}
                        error={Validation.phone_number.error}
                        helperText={Validation.phone_number.helperText}
                        fullWidth
                    />
                    {

                        !Values.id && (
                            <>
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
                                <Button type="submit" disabled={IsBTNLoading} variant="contained" mb={1} fullWidth>
                                    {
                                        IsBTNLoading ? <CircularProgress size={24} /> : "Submit"
                                    }
                                </Button>
                            </>
                        )
                    }
                </form>
            </FromWrapper>
        </BasicWrapper>
    );
};

export default memo(Form);
