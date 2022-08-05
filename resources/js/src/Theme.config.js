import createTheme from '@mui/material/styles/createTheme';

const lightTheme = createTheme({
    palette:{
        mode:'light',
        primary:{
            main:'#3845b1',
            light:'#7070e4',
            dark:'#001e80',
            contrastText:'#ffffff'
        },
        secondary:{
            light:'#6ec6ff',
            main:'#2196f3',
            dark:'#0069c0',
            contrastText:'#ffffff'
        },
        background:{
            paper:'#fff',
            default:'#EEEEEE'
        }
    }
});

export {lightTheme};
