import React, { memo, useContext, useEffect, useState } from "react";
import Grid from "@mui/material/Grid";
import Box from "@mui/material/Box";
import Typography from "@mui/material/Typography";
import Stack from "@mui/material/Stack";
import IconButton from '@mui/material/IconButton';
import InputBase from '@mui/material/InputBase';
import Tooltip from '@mui/material/Tooltip';
import SearchRoundedIcon from "@mui/icons-material/SearchRounded";
import NotificationsRoundedIcon from "@mui/icons-material/NotificationsRounded";
import AccountMenu from "../../AccountMenu/AccountMenu";
import { AuthContext } from "../../../Providers/Auth/AuthProvider";
import Skeleton from "@mui/material/Skeleton";

const SectionNavigation = () => {
    const { Auth: { data } } = useContext(AuthContext);
    const [Hours, setHours] = useState(new Date().getHours());
    // const name = data.name.split(" ");

    useEffect(() => {
        const dateInterVal = setInterval(() => {
            setHours(new Date().getHours());
        }, 60000);

        return () => {
            clearInterval(dateInterVal);
        };
    }, []);

    return (
        <Grid container spacing="1" sx={{ borderBottom: '1px solid', borderBottomColor: 'background.default' }}>
            <Grid item md={5} sx={{ display: { xs: "none", md: "block" } }}>
                <Box
                    sx={{
                        display: "flex",
                        pl: 3,
                        height: "80px",
                        flexDirection: "column",
                        justifyContent: "flex-end",
                        pb: 1
                    }}
                >
                    <Typography
                        component="h1"
                        variant="h5"
                        sx={{ fontSize: "1.75rem", /* mb:'5px', */ fontWeight: 600 }}
                    >
                        {
                            data.hasOwnProperty("name") ? (
                                (
                                    Hours >= 3 && Hours < 12
                                        ? "Good Morning"
                                        : Hours >= 12 && Hours < 17
                                            ? "Good Afternoon"
                                            : Hours >= 17 && Hours < 21
                                                ? "Good Evening"
                                                : "Good Night"
                                ) + " " +
                                (
                                    data.name.split(" ").length === 1
                                        ? data.name.split(" ")[0]
                                        : data.name.split(" ")[0] + " " + data.name.split(" ")[1]
                                )
                            ) : (
                                <Skeleton width={300} />
                            )
                        }
                    </Typography>
                    <Typography sx={{ fontSize: ".9rem", color: "gray" }}>
                        What we do today is what matters most
                    </Typography>
                </Box>
            </Grid>
            <Grid item md={7} xs={12}>
                <Stack
                    direction="row"
                    spacing={2}
                    sx={{
                        height: "70px",
                        justifyContent: "flex-end",
                        alignItems: "flex-end",
                        pb: 1,
                        pr: 1,
                    }}
                >
                    <Box
                        sx={{
                            border: "1px solid white",
                            py: "3px",
                            width: "400px",
                            backgroundColor: "background.default",
                            borderRadius: "10px",
                            pl: "10px",
                            pr: "20px",
                            display: "flex",
                            alignItems: "center",
                        }}
                    >
                        <SearchRoundedIcon />
                        <InputBase
                            sx={{ ml: 1, flex: 1 }}
                            placeholder="Search"
                            inputProps={{ "aria-label": "search" }}
                        />
                    </Box>
                    <Tooltip title="Notification" >
                        <Box
                            sx={{ backgroundColor: "background.paper", borderRadius: "50%"/* , display:{xs:'block', lg:'none'} */ }}
                        >
                            <IconButton color="primary">
                                <NotificationsRoundedIcon />
                            </IconButton>
                        </Box>
                    </Tooltip>
                    <AccountMenu /* display={{xs:'block', lg:'none'}} */ />
                </Stack>
            </Grid>
        </Grid>
    );
};

export default memo(SectionNavigation);
