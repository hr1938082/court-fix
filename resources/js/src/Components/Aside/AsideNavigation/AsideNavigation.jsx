import React, { memo } from 'react';
import Stack from '@mui/material/Stack';
import Tooltip from '@mui/material/Tooltip';
import Box from '@mui/material/Box';
import IconButton from '@mui/material/IconButton';
import NotificationsRoundedIcon from "@mui/icons-material/NotificationsRounded";
import AccountMenu from '../../AccountMenu/AccountMenu';
import { Badge } from '@mui/material';

const AsideNavigation = () => {
    return (
        <Stack
            direction="row"
            spacing={2}
            sx={{
                height: "80px",
                justifyContent: "flex-end",
                alignItems: "flex-end",
                pb: 2,
                pr: 2,
            }}
        >
            <Tooltip title="Notification" >
                <Box
                    sx={{ backgroundColor: "background.paper", borderRadius: "50%", display: { xs: 'none', lg: 'block' } }}
                >
                    <IconButton color="primary">
                        <Badge color='error' variant='dot' overlap='circular'>
                            <NotificationsRoundedIcon />
                        </Badge>
                    </IconButton>
                </Box>
            </Tooltip>
            <AccountMenu display={{ xs: 'none', lg: 'block' }} />
        </Stack>
    )
}

export default memo(AsideNavigation)