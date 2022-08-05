import { styled} from '@mui/system';
import React from 'react';
import Box from '@mui/material/Box';
import Typography from '@mui/material/Typography';

const MainWrapper = styled('div')(({ theme }) => ({
    height: 150,
    width: 250,
    borderRadius: 20,
    backgroundColor: '#dddddd',
    boxShadow: theme.shadows[10]
}));
const InnerWrapper = styled('div')({
    height: 140,
    width: 250,
    display:'flex',
    justifyContent:'flex-end',
    alignItems:'flex-end',
    borderRadius:20,
    backgroundColor: '#ffffff',
})
const Content = styled('div')({
    position:'relative',
    height: 140,
    width:247,
    borderRadius: 20,
    backgroundColor: '#f9f9f9',
    overflow:'hidden'
});


const DashboardCard = (props) => {
    const {color, icon, title, text} = props;
    return (
        <MainWrapper>
            <InnerWrapper>
                <Content>
                    <Box sx={{position:'absolute', top:0, left:0, right:0, height:40,bgcolor:'#f9f9f9',zIndex:100,borderBottomRightRadius:30}}/>
                    <Box sx={{position:'absolute', boxShadow:'-10px -5px 0 0 #f9f9f9', right:0, top:32,borderTopLeftRadius:13, height:30,width:20,zIndex:100}}/>
                    <Box sx={{position:'absolute',top:0,right:0,bottom:0, width:'20px', bgcolor:color}}/>
                    <Box sx={{position:'absolute', boxShadow:'-10px 5px 0 0 #f9f9f9', right:0, bottom:30,borderBottomLeftRadius:13, height:20,width:20,zIndex:100}}/>
                    <Box sx={{position:'absolute', bottom:0, left:0, right:0, height:40,bgcolor:'#f9f9f9',zIndex:100,borderTopRightRadius:33}}/>
                    <Box sx={{position:'absolute', display:'flex', justifyContent:'center', flexDirection:'column', alignItems:'center', top:0, height:'100%', width:'100%', zIndex:101}}>
                        <Box sx={{  px:4, fontSize:'3rem'}}>
                            {icon}
                        </Box>
                        <Typography variant='h6' px={4}component="h1" color="#666666">{title}</Typography>
                        <Typography variant='h4' px={4} component="h1" >{text}</Typography>
                    </Box>
                </Content>
            </InnerWrapper>
        </MainWrapper>
    )
}

export default DashboardCard
