import React, { useCallback, useContext, useEffect, useLayoutEffect, useRef, useState } from "react";
import BasicWrapper from "../../Components/Wrapper/BasicWrapper";
import FormWrapper from "../../Components/Wrapper/FromWrapper";
import { AuthContext } from "../../Providers/Auth/AuthProvider";
import Box from '@mui/material/Box';
import TextField from '@mui/material/TextField';
import Button from '@mui/material/Button';
import Tooltip from '@mui/material/Tooltip';
import IconButton from "@mui/material/IconButton";
import PhotoCameraIcon from '@mui/icons-material/PhotoCamera';
import useImageToBase64 from "../../../../../../MailZip/resources/js/src/functions/useImageToBase64";
import EditIcon from '@mui/icons-material/Edit';
import useAuthRequest from "../../Request/AuthRequest/useAuthRequest";
import CircularProgress from "@mui/material/CircularProgress";

const Profile = () => {
    const imgInputRef = useRef();
    const {updateProfile} = useAuthRequest();
    const defaultValidation = { error: false, helperText: '' };
    const {
        Auth: { data },
        showAlert,
        saveData
    } = useContext(AuthContext);
    const [IsBTNLoading, setIsBTNLoading] = useState(false);
    const [Values, setValues] = useState({
        name: "",
        email: "",
        image: "",
    });
    const setData = useCallback(
      () => {
          if ( Object.keys(data).length > 1) {
            setValues(data);
          }
      },
      [data],
    )

    useEffect(() => {
        setData();
    }, [data])
    const [Validation, setValidation] = useState({
        name: defaultValidation,
        email: defaultValidation,
        isEmailVerified: false,
        image: defaultValidation,
    })
    const handleChange = (e) => {
        const { name, value } = e.target;
        setValues({ ...Values, [name]: value });
    }
    const handleChangeImage = (e) => {
        const file = e.target.files[0];
        const ext = file.type.split('/')[1];
        if (ext !== 'jpg' && ext !== 'jpeg' && ext !== 'png' && ext !== 'bmp') {
            setValidation({ ...Validation, image: { error: true, helperText: "File not Supported" } });
            return;
        }
        setValidation({ ...Validation, image: { error: false, helperText: "" } });
        useImageToBase64(e).then(res => {
            setValues({ ...Values, image: res[0] });
            e.target.value = "";
        });
    }
    const handleSubmit = (e) => {
        e.preventDefault();
        setIsBTNLoading(true);
        updateProfile(Values).then(res=>{
            showAlert('success','Profile Updated');
            saveData(localStorage.getItem('CISessionToken'));
            setIsBTNLoading(false);
        });
    }
    return (
        <BasicWrapper sx={{ alignItems: "normal", height: "auto" }}>
            <FormWrapper title="Profile" >
                <form onSubmit={handleSubmit}>
                    <Box mb={2} sx={{ height: '200px', display: 'flex', flexDirection: 'column', justifyContent: 'center', alignItems: 'center' }}>
                        <input type="file" ref={imgInputRef} onChange={handleChangeImage} hidden />
                        {
                            Values.image ? (
                                <Box sx={{ position:"relative" }}>
                                    <img src={Values.image} alt="upload" height={200} width={200} style={{borderRadius: '50%', boxShadow:'0 0 10px rgba(0,0,0,.5)'}}/>
                                    <Box sx={{ position: 'absolute', bottom: 30, right: 30 }}>
                                        <Tooltip title="Edit">
                                            <IconButton size="small" onClick={() => imgInputRef.current.click()} sx={{ bgcolor: 'background.paper', fontSize: '4.5rem', '&:hover': { bgcolor: 'black', color: 'background.paper', boxShadow: '0 0 10px rgba(255, 255, 255, .2)' } }} >
                                                <EditIcon fontSize="small"/>
                                            </IconButton>
                                        </Tooltip>
                                    </Box>
                                </Box>
                            ) : (
                                <Tooltip title="Upload" placement='right' arrow>
                                    <IconButton onClick={() => imgInputRef.current.click()} size='large' sx={{ bgcolor: 'background.default', fontSize: '4.5rem', '&:hover': { bgcolor: 'primary.main', color: 'background.paper' } }}>
                                        <PhotoCameraIcon fontSize='10rem' />
                                    </IconButton>
                                </Tooltip>
                            )
                        }
                    </Box>
                    {Validation.image.error && <Box my={2} sx={{ color: 'error.main' }}>{Validation.image.helperText}</Box>}
                    <Box mb={2}>
                        <TextField
                            label="Name"
                            onChange={handleChange}
                            name="name"
                            value={Values.name}
                            error={Validation.name.error}
                            helperText={Validation.name.helperText}
                            fullWidth
                            autoFocus
                        />
                    </Box>
                    <Box mb={2}>
                        <TextField
                            label="Email"
                            onChange={handleChange}
                            name="email"
                            InputProps={{ disabled: true, readOnly: true }}
                            value={Values.email}
                            error={!Values.isEmailVerified}
                            helperText={Values.isEmailVerified ? 'Verified' : 'Not Verified'}
                            fullWidth
                        />
                    </Box>
                    <Box mb={1}>
                        <Button
                            type="submit"
                            disabled={IsBTNLoading}
                            variant="contained"
                            fullWidth
                        >
                            {IsBTNLoading ? (
                                <CircularProgress size={24} />
                            ) : (
                                "Submit"
                            )}
                        </Button>
                    </Box>
                </form>
            </FormWrapper>
        </BasicWrapper>
    );
};

export default Profile;
