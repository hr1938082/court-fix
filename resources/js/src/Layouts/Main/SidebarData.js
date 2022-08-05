import HomeRoundedIcon from '@mui/icons-material/HomeRounded';
import SchoolIcon from '@mui/icons-material/School';
import GroupRoundedIcon from '@mui/icons-material/GroupRounded';
import PhoneIcon from '@mui/icons-material/Phone';

const SidebarData = [
    {
        title: 'Dashboard',
        link: '/admin',
        icon: <HomeRoundedIcon/>
    },
    {
        title: 'Users',
        link: '/admin/users',
        icon: <GroupRoundedIcon/>
    },
    {
        title: 'Courses',
        icon: <SchoolIcon/>,
        link: '/admin/courses',
    },
    {
        title: 'Contact Us',
        icon: <PhoneIcon/>,
        link: '/admin/contact.us',
    },
];

export default SidebarData;
