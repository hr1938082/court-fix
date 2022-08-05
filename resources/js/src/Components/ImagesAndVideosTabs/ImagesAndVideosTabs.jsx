import React, { memo, useRef, useState } from 'react';
import PropTypes from 'prop-types'
import Box from '@mui/material/Box';
import Tabs from '@mui/material/Tabs';
import Tab from '@mui/material/Tab';
import TabPanel from '../TabPanel/TabPanel';
import Tooltip from '@mui/material/Tooltip';
import IconButton from '@mui/material/IconButton';
import useImageToBase64 from '../../../../../../MailZip/resources/js/src/functions/useImageToBase64';
import PhotoCameraIcon from '@mui/icons-material/PhotoCamera';
import EditIcon from '@mui/icons-material/Edit';
import { baseURL } from '../../Constants';



function a11yProps(index) {
    return {
        id: `simple-tab-${index}`,
        'aria-controls': `simple-tabpanel-${index}`,
    };
}

const ImagesAndVideosTabs = (props) => {
    const { state, setState, validation, setValidation } = props;
    const [value, setValue] = useState(0);
    const imgInputRef = useRef();
    const handleChange = (event, newValue) => {
        setValue(newValue);
    };

    const handleChangeImage = (e) => {
        const file = e.target.files[0];
        const ext = file.type.split('/')[1];
        if (ext !== 'jpg' && ext !== 'jpeg' && ext !== 'png' && ext !== 'bmp') {
            setValidation({ ...validation, image: { error: true, helperText: "File not Supported" } });
            return;
        }
        setValidation({ ...validation, image: { error: false, helperText: "" } });
        useImageToBase64(e).then(res => {
            setState({ ...state, image: res[0] });
            e.target.value = "";
        });
    }
    return (
        <Box sx={{ width: '100%' }}>
            <Box>
                {state.video_path !== "" && (
                    <Tabs value={value} onChange={handleChange} centered>
                        <Tab label="Image" {...a11yProps(0)} />
                        <Tab label="Video" {...a11yProps(1)} />
                    </Tabs>
                )}
            </Box>
            <TabPanel value={value} index={0}>
                <Box mb={2} sx={{ position: 'relative', overflow: 'hidden', height: '360px', border: '2px solid', borderColor: 'background.paper', display: 'flex', flexDirection: 'column', justifyContent: 'center', alignItems: 'center' }}>
                    <input type="file" ref={imgInputRef} onChange={handleChangeImage} hidden />
                    {
                        state.image && (
                            <Box sx={{ position: 'absolute', top: 10, right: 10 }}>
                                <Tooltip title="Edit">
                                    <IconButton onClick={() => imgInputRef.current.click()} sx={{ bgcolor: 'background.paper', fontSize: '4.5rem', '&:hover': { bgcolor: 'black', color: 'background.paper', boxShadow: '0 0 10px rgba(255, 255, 255, .2)' } }} >
                                        <EditIcon />
                                    </IconButton>
                                </Tooltip>
                            </Box>
                        )
                    }
                    {
                        state.image ? (
                            <Box >
                                <img src={state.image} alt="upload" style={{ height: '100%', width: '100%', }} />
                            </Box>
                        ) : (
                            <Tooltip title="Image Upload" placement='right' arrow>
                                <IconButton onClick={() => imgInputRef.current.click()} size='large' sx={{ bgcolor: 'background.default', fontSize: '4.5rem', '&:hover': { bgcolor: 'primary.main', color: 'background.paper' } }}>
                                    <PhotoCameraIcon fontSize='10rem' />
                                </IconButton>
                            </Tooltip>
                        )
                    }
                </Box>
                {validation.image.error && <Box my={2} sx={{ color: 'error.main' }}>{validation.image.helperText}</Box>}
            </TabPanel>
            <TabPanel value={value} index={1}>
                <video controls style={{height:'400px', width:'100%'}}>
                    <source src={baseURL+ '/video/' + state.video_path}/>Your browser does not support the video tag. I suggest you upgrade your browser
                </video>
            </TabPanel>
        </Box>
    )
}

ImagesAndVideosTabs.protoType = {
    state: PropTypes.object.isRequired,
    setState: PropTypes.func.isRequired,
    validation: PropTypes.object.isRequired,
    setValidation: PropTypes.func.isRequired,
}

export default memo(ImagesAndVideosTabs)
