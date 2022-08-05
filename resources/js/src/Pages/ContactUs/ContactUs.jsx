import React, { useCallback, useEffect, useState } from 'react'
import BasicWrapper from '../../Components/Wrapper/BasicWrapper';
import DataTable from '../../Components/DataTable/DataTable';
import Tooltip from '@mui/material/Tooltip';
import IconButton from '@mui/material/IconButton';
import VisibilityIcon from '@mui/icons-material/Visibility';
import useContactUs from '../../Request/ContactUsRequest/useContactUs';
import { useNavigate } from 'react-router-dom';

const ContactUs = () => {
    const navigate = useNavigate();
    const {index} = useContactUs();
    const [Row, setRow] = useState([]);
    const [IsLoading, setIsLoading] = useState(false);
    const columns = [
        {
            field: 'name',
            headerName: 'Name',
        },
        {
            field: 'email',
            headerName: 'Email',
        },
        {
            field: 'message',
            headerName: 'Message',
        },
        {
            field: 'created_at',
            headerName: 'Created Date',
        },
        {
            field: 'actions',
            headerName: 'Actions',

            renderCell: (params) => {
                const name = params.row.name.split(' ').join('.');
                return (
                    <Tooltip title='View' placement='top'>
                        <IconButton size='small' color='primary' onClick={() => {navigate('view/'+name, { state: params.row });}}>
                            <VisibilityIcon />
                        </IconButton>
                    </Tooltip>
                )
            }
        },
    ];
    const getData = useCallback(
      () => {
        index().then(res=>{
            setRow(res);
            setIsLoading(false);
        })
      },
      [],
    )
    useEffect(() => {
        setIsLoading(true);
        getData();
    }, [])


  return (
      <BasicWrapper>
      <DataTable
          columns={columns}
          rows={Row}
          title="Courses"
          loading={IsLoading}
      />
      </BasicWrapper>
  )
}

export default ContactUs
