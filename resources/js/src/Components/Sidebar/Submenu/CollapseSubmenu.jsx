import React, { memo, useState, useEffect } from 'react';
import PropTypes from 'prop-types';
import List from "@mui/material/List";
import ListItem from "@mui/material/ListItem";
import ListItemButton from "@mui/material/ListItemButton";
import ListItemIcon from "@mui/material/ListItemIcon";
import ListItemText from "@mui/material/ListItemText";
import Collapse from '@mui/material/Collapse';
import ExpandLessIcon from '@mui/icons-material/ExpandLess';
import ExpandMoreIcon from '@mui/icons-material/ExpandMore';
import {useLocation, useNavigate} from 'react-router-dom';

const CollapseSubmenu = (props) => {
    const {data} = props;
    const navigate = useNavigate();
    const {pathname} = useLocation();
    const [open, setopen] = useState(false);
    const handleToggleOpen = () =>{
        setopen(!open);
    }
    const checkLinkForCollapse = () => {
        let open = false;
        data.submenu.filter((row)=>{
            if (row.link === pathname) {
                open = true;
            }
        });
        return open
    }
    useEffect(() => {
        if (checkLinkForCollapse()) {
            setopen(true);
        }
    }, [])

  return (
    <>
        <ListItem disablePadding>
            <ListItemButton onClick={handleToggleOpen} sx={{ pl: '20px' }}>
                <ListItemIcon sx={{color:'black'}}>
                    {data.icon}
                </ListItemIcon>
                <ListItemText primary={data.title} sx={{m:0}}/>
                {open ? <ExpandMoreIcon/> : <ExpandLessIcon/> }
            </ListItemButton>
        </ListItem>
        <Collapse in={open} timeout="auto" unmountOnExit>
            <List component="div" disablePadding>
                {
                    data.submenu.map((val,index)=>{
                        return(
                            <ListItem disablePadding key={index} onClick={() => navigate(val.link)} sx={{
                                position:'relative',
                                backgroundColor: (pathname === val.link) && 'rgba(0,0,0,0.1)',
                                '&::before':{
                                  content:'""',
                                  position: 'absolute',
                                  right:0,
                                  top:0,
                                  height:'100%',
                                  width: pathname === val.link ? '3px' : 0,
                                  backgroundColor:'primary.main'
                                }
                                }}
                            >
                                <ListItemButton sx={{ pl: 4 }}>
                                    <ListItemIcon sx={{color: pathname === val.link ? 'primary.main' : 'black',}}>
                                        {val.icon}
                                    </ListItemIcon>
                                    <ListItemText primary={val.title} sx={{color: pathname === val.link ? 'primary.main' : 'black',}}/>
                                </ListItemButton>
                            </ListItem>
                        )
                    })
                }
            </List>
        </Collapse>
    </>
  )
}

CollapseSubmenu.propTypes = {
    data: PropTypes.object.isRequired
}

export default memo(CollapseSubmenu);
