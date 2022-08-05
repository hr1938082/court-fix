import React, { memo, useState } from "react";
import { styled } from '@mui/material/styles';
import PropTypes from "prop-types";
import MuiDrawer from '@mui/material/Drawer';
import Box from "@mui/material/Box";
import List from "@mui/material/List";
import ListItem from "@mui/material/ListItem";
import ListItemButton from "@mui/material/ListItemButton";
import ListItemIcon from "@mui/material/ListItemIcon";
import ListItemText from "@mui/material/ListItemText";
import Tooltip from "@mui/material/Tooltip";
import { useNavigate, useLocation } from "react-router-dom";
import TippySubmenu from "./Submenu/TippySubmenu";
import MenuRoundedIcon from '@mui/icons-material/MenuRounded';
import { IconButton } from "@mui/material";
import CollapseSubmenu from "./Submenu/CollapseSubmenu";
import Logo from '../../Images/Logo.png';
import './sidebar.css';

const drawerWidth = 240;

const openedMixin = (theme) => ({
  width: drawerWidth,
  transition: theme.transitions.create('width', {
    easing: theme.transitions.easing.sharp,
    duration: theme.transitions.duration.enteringScreen,
  }),
});

const closedMixin = (theme) => ({
  transition: theme.transitions.create('width', {
    easing: theme.transitions.easing.sharp,
    duration: theme.transitions.duration.leavingScreen,
  }),
  width: `calc(${theme.spacing(7)} + 1px)`,
  [theme.breakpoints.up('sm')]: {
    width: `calc(${theme.spacing(8)} + 1px)`,
  },
});

const Drawer = styled(MuiDrawer, { shouldForwardProp: (prop) => prop !== 'open' })(
  ({ theme, open }) => ({
    width: drawerWidth,
    flexShrink: 0,
    whiteSpace: 'nowrap',
    boxSizing: 'border-box',
    borderRight:`1px solid ${theme.palette.background.paper}`,
    ...(open && {
      ...openedMixin(theme),
      '& .MuiDrawer-paper': openedMixin(theme),
    }),
    ...(!open && {
      ...closedMixin(theme),
      '& .MuiDrawer-paper': closedMixin(theme),
    }),
  }),
);

const Sidebar = (prop) => {
  const { data, handleBackdrop } = prop;
  const navigate = useNavigate();
  const {pathname} = useLocation();
  const [open, setopen] = useState(true);
  const handleToggleDrawer = () => {
    setopen(!open);
    handleBackdrop();
  }
  return (
    <Drawer
      variant="permanent"
      anchor="left"
      open={open}
      sx={{'& .MuiDrawer-paper':{
        borderRightColor:'background.default',
        backgroundColor:'background.paper'
      }}}
    >
      <Box
        sx={{
          height: '80px',
          display:"flex",
          justifyContent: open ? "space-between" : "center",
          alignItems: 'center'
        }}
      >
        <IconButton
          sx={{ml:open && 1, color:'black'}}
          onClick={handleToggleDrawer}
        >
          <MenuRoundedIcon/>
        </IconButton>
        <Box sx={{display: open ? "flex" : "none", justifyContent:"center", alignItems:"center", mr:3}}>
          <img src={Logo} alt="Logo" height={40} />
        </Box>
      </Box>
      <List
      >
        {data.map((val, index) => {
          return (
            val.submenu ? (
              open ? (
                <CollapseSubmenu key={index} data={val} />
              ):(
                <TippySubmenu key={index} data={val.submenu} title={val.title}>
                    <ListItem disablePadding sx={{
                        position:'relative',
                        backgroundColor: (val.submenu[0].link.split('/')[1] == pathname.split('/')[1]) && 'rgba(0,0,0,0.1)',
                        '&::before':{
                          content:'""',
                          position: 'absolute',
                          right:0,
                          top:0,
                          height:'100%',
                          width: val.submenu[0].link.split('/')[1] == pathname.split('/')[1] ? '3px' : 0,
                          backgroundColor:'primary.main'
                        }
                      }}
                    >
                      <ListItemButton sx={{ px: 0, }}>
                        <ListItemIcon
                          sx={{
                            width: "100%",
                            ml:'20px',
                            color: val.submenu[0].link.split('/')[1] == pathname.split('/')[1] ? 'primary.main' : 'black',
                          }}
                        >
                          {val.icon}
                        </ListItemIcon>
                      </ListItemButton>
                    </ListItem>
                </TippySubmenu>
              )
            ):(
              open ? (
                <ListItem key={index} disablePadding onClick={() => navigate(val.link)} sx={{
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
                  <ListItemButton sx={{pl:'20px'}}>
                    <ListItemIcon sx={{color: pathname === val.link ? 'primary.main' : 'black',}}>
                      {val.icon}
                    </ListItemIcon>
                    <ListItemText primary={val.title} sx={{m:0, color: pathname === val.link ? 'primary.main' : 'black',}}/>
                  </ListItemButton>
                </ListItem>
              ):(
                <Tooltip title={val.title} arrow placement="right" key={index}>
                  <ListItem disablePadding onClick={() => navigate(val.link)} sx={{
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
                  }}>
                    <ListItemButton sx={{ px: 0 }}>
                      <ListItemIcon
                        sx={{
                          width: "100%",
                          ml:'20px',
                          color: pathname === val.link ? 'primary.main' : 'black',
                        }}
                      >
                        {val.icon}
                      </ListItemIcon>
                    </ListItemButton>
                  </ListItem>
                </Tooltip>
              )
            )
          );
        })}
      </List>
    </Drawer>
  );
};

Sidebar.propTypes = {
  data: PropTypes.array.isRequired,
  handleBackdrop: PropTypes.func.isRequired
};

export default memo(Sidebar);
