import React from "react";
import { styled } from "@mui/system";
import Typography from '@mui/material/Typography';

const Wrapper = styled('div')(({theme})=>({
    display: 'block',
    width: '640px',
    flexShrink:0,
    backgroundColor: theme.palette.background.paper,
    padding: 20,
    borderRadius: 5,
    backgroundColor:theme.palette.background.default,
    boxShadow:'0 0 10px rgba(0,0,0,.2)'
}));

const FromWrapper = (props) => {
    const {title, children} = props
    return(
        <Wrapper>
            <Typography variant="h5" sx={{pb:2}} component="h1">{title}</Typography>
            {children}
        </Wrapper>
    )
}

export default FromWrapper
