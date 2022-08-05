import React, { useContext, useEffect, useRef, useState } from 'react';
import BasicWrapper from '../../Components/Wrapper/BasicWrapper';
import FormWrapper from '../../Components/Wrapper/FromWrapper';
import Box from '@mui/material/Box';
import TextField from '@mui/material/TextField';
import IconButton from '@mui/material/IconButton';
import Tooltip from '@mui/material/Tooltip';
import PhotoCameraIcon from '@mui/icons-material/PhotoCamera';
import Button from '@mui/material/Button';
import useImageToBase64 from '../../../../../../MailZip/resources/js/src/functions/useImageToBase64';
import EditIcon from '@mui/icons-material/Edit';
import useCoursesRequest from '../../Request/CoursesRequest/useCoursesRequest';
import { AuthContext } from '../../Providers/Auth/AuthProvider';
import CircularProgress from '@mui/material/CircularProgress';
import { useLocation, useNavigate } from 'react-router-dom';
import { baseURL } from '../../Constants';


const Form = () => {
    const {state} = useLocation();
    const navigate = useNavigate();
    const {showAlert} =  useContext(AuthContext);
    const {store, update} = useCoursesRequest();
    const defaultValidation = {error:false, helperText:''};
    const imgInputRef = useRef(null);
    const [IsBTNLoading, setIsBTNLoading] = useState(false);
    const [Values, setValues] = useState({
        id:"",
        title:"",
        sub_title:"",
        code:"",
        link:"",
        image:""
    });
    const [Validation, setValidation] = useState({
        title:defaultValidation,
        sub_title:defaultValidation,
        code:defaultValidation,
        link:defaultValidation,
        image:defaultValidation
    })

    useEffect(() => {
        if (state) {
            setValues({
                id:state.id,
                title:state.title,
                sub_title:state.sub_title,
                code:state.code,
                link:state.link,
                image:baseURL+'/image/'+state.images
            });
        }
    }, [])

    const handleChangeImage = (e)=>{
        const file = e.target.files[0];
        const ext = file.type.split('/')[1];
        if (ext !== 'jpg' && ext !== 'jpeg' && ext !== 'png' && ext !== 'bmp') {
            setValidation({...Validation, image:{error:true, helperText:"File not Supported"}});
            return;
        }
        setValidation({...Validation, image:{error:false, helperText:""}});
        useImageToBase64(e).then(res=>{
            setValues({...Values, image:res[0]});
            e.target.value = "";
        });
    }

    const handleChange = (e) => {
        const {name, value} = e.target;
        setValues({...Values, [name]:value});
    }

    const handleSubmit = (e) =>{
        e.preventDefault();
        const response = (res) => {
            if (!res.hasOwnProperty('message')) {
                setIsBTNLoading(false);
                showAlert("success", "Operation Successfull");
                navigate("/admin/courses");
            }else{
                setIsBTNLoading(false);
                const message = res.message;
                const title = message.hasOwnProperty('title') ? {error: true, helperText: message.title[0]} : defaultValidation;
                const sub_title = message.hasOwnProperty('sub_title') ? {error: true, helperText: message.sub_title[0]} : defaultValidation;
                const code = message.hasOwnProperty('code') ? {error: true, helperText: message.code[0]} : defaultValidation;
                const link = message.hasOwnProperty('link') ? {error: true, helperText: message.link[0]} : defaultValidation;
                const image = message.hasOwnProperty('image') ? {error: true, helperText: message.image[0]} : defaultValidation;
                setValidation({
                    title,
                    sub_title,
                    code,
                    link,
                    image,
                });
            }
        }
        if (!Validation.image.error) {
            setIsBTNLoading(true);
            if (Values.id) {
                let image = Values.image.split('.');
                let data = {}
                if (image.length>1) {
                    data = {...Values, image:""};
                }else{
                    data = {...Values};
                }
                update(data).then(res => response(res));
            }else{
                store(Values).then(res => response(res));
            }
        }
    }
  return (
      <BasicWrapper sx={{alignItems:'normal', height: 'auto'}}>
          <FormWrapper title={`${Values.id ? 'Edit' : 'Create'} Course`}>
              <form onSubmit={handleSubmit}>
                <Box mb={2} sx={{position:'relative',overflow:'hidden', height:'360px',border:'2px solid',borderColor:'background.paper', display:'flex', flexDirection:'column', justifyContent:'center',alignItems:'center'}}>
                    <input type="file" ref={imgInputRef} onChange={handleChangeImage} hidden />
                    {
                        Values.image && (
                            <Box sx={{position:'absolute',top:10, right:10}}>
                                    <Tooltip title="Edit">
                                        <IconButton onClick={()=>imgInputRef.current.click()} sx={{bgcolor:'background.default', fontSize:'4.5rem','&:hover':{bgcolor:'black', color:'background.paper', boxShadow:'0 0 10px rgba(255, 255, 255, .2)'}}} >
                                            <EditIcon/>
                                        </IconButton>
                                    </Tooltip>
                                </Box>
                        )
                    }
                    {
                        Values.image ? (
                            <Box >
                                <img src={Values.image}  alt="upload" style={{ height:'100%',width:'100%',}}/>
                            </Box>
                        ):(
                            <Tooltip title="Image Upload" placement='right' arrow>
                                <IconButton onClick={()=>imgInputRef.current.click()} size='large' sx={{bgcolor:'background.default', fontSize:'4.5rem','&:hover':{bgcolor:'primary.main', color:'background.paper'}}}>
                                    <PhotoCameraIcon/>
                                </IconButton>
                            </Tooltip>
                        )
                    }
                </Box>
                    { Validation.image.error && <Box my={2} sx={{color:'error.main'}}>{Validation.image.helperText}</Box> }
                <Box mb={2}>
                    <TextField label="Title" onChange={handleChange} name='title' value={Values.title} error={Validation.title.error} helperText={Validation.title.helperText} fullWidth autoFocus />
                </Box>
                <Box display="flex" justifyContent="space-between" mb={2}>
                    <Box width="49.5%">
                        <TextField label="Sub title" onChange={handleChange} name='sub_title' value={Values.sub_title} error={Validation.sub_title.error} helperText={Validation.sub_title.helperText} fullWidth />
                    </Box>
                    <Box width="49.5%">
                        <TextField label="Course code" onChange={handleChange} name='code' value={Values.code} error={Validation.code.error} helperText={Validation.code.helperText} fullWidth />
                    </Box>
                </Box>
                <Box mb={2}>
                    <TextField label="Link" onChange={handleChange} name='link' value={Values.link} error={Validation.link.error} helperText={Validation.link.helperText} fullWidth />
                </Box>
                <Box mb={1}>
                    <Button type='submit' disabled={IsBTNLoading} variant='contained' fullWidth>
                        {
                            IsBTNLoading ? <CircularProgress size={24}/> : "Submit"
                        }
                    </Button>
                </Box>
              </form>
          </FormWrapper>
      </BasicWrapper>
  )
}

export default Form
