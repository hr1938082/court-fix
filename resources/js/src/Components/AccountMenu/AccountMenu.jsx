import React, { memo, useContext, useState } from "react";
import PropTypes from 'prop-types';
import Box from "@mui/material/Box";
import Tooltip from '@mui/material/Tooltip';
import IconButton from "@mui/material/IconButton";
import Avatar from '@mui/material/Avatar';
import Menu from '@mui/material/Menu';
import MenuItem from '@mui/material/MenuItem';
import Divider from '@mui/material/Divider';
import ListItemIcon from '@mui/material/ListItemIcon';
import LoginRounded from '@mui/icons-material/LoginRounded';
import Skeleton from "@mui/material/Skeleton";
import { AuthContext } from "../../Providers/Auth/AuthProvider";
import useAuthRequest from "../../Request/AuthRequest/useAuthRequest";
import { useNavigate } from "react-router-dom";

const AccountMenu = (props) => {
    const navigate = useNavigate();
    const { Auth: { data }, logout } = useContext(AuthContext);
    const { display } = props;
    const [anchorEl, setAnchorEl] = useState(null);
    const open = Boolean(anchorEl);
    const handleClick = (event) => {
        setAnchorEl(event.currentTarget);
    };
    const handleClose = () => {
        setAnchorEl(null);
    };
    return (
        <Box sx={{ height: '100%', display: "flex", alignItems: "flex-end" }}>
            <Tooltip title="Account Settings">
                <IconButton
                    sx={{ p: 0, display }}
                    onClick={handleClick}
                    size="small"
                    aria-controls={open ? 'account-menu' : undefined}
                    aria-haspopup="true"
                    aria-expanded={open ? 'true' : undefined}
                >
                    {
                        data.image ? (
                            <Avatar sx={{ width: 40, height: 40 }}>
                                <img src={data.image} alt="avatar" />
                            </Avatar>
                        ) : (
                            <Avatar />
                        )
                    }
                </IconButton>
            </Tooltip>
            <Menu
                anchorEl={anchorEl}
                id="account-menu"
                open={open}
                onClose={handleClose}
                onClick={handleClose}
                PaperProps={{
                    elevation: 0,
                    sx: {
                        overflow: "visible",
                        filter: "drop-shadow(0px 2px 8px rgba(0,0,0,0.32))",
                        mt: 1.5,
                        "& .MuiAvatar-root": {
                            width: 32,
                            height: 32,
                            ml: -0.5,
                            mr: 1,
                        },
                        "&:before": {
                            content: '""',
                            display: "block",
                            position: "absolute",
                            top: 0,
                            right: 14,
                            width: 10,
                            height: 10,
                            bgcolor: "background.paper",
                            transform: "translateY(-50%) rotate(45deg)",
                            zIndex: 0,
                        },
                    },
                }}
                transformOrigin={{ horizontal: "right", vertical: "top" }}
                anchorOrigin={{ horizontal: "right", vertical: "bottom" }}
            >
                <MenuItem onClick={() => navigate('/admin/profile')}>
                    {
                        data.image ? (
                            <Avatar sx={{ width: 40, height: 40 }}>
                                <img src={data.image} alt="avatar" />
                            </Avatar>
                        ) : (
                            <Avatar />
                        )
                    }
                    {data.hasOwnProperty('name') ? data.name : <Skeleton width={70} />}
                </MenuItem>
                <Divider />
                <MenuItem onClick={() => logout()}>
                    <ListItemIcon>
                        <LoginRounded fontSize="small" />
                    </ListItemIcon>
                    Logout
                </MenuItem>
            </Menu>
        </Box>
    );
};

export default memo(AccountMenu);
