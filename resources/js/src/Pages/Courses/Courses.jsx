import React, { memo, useCallback, useContext, useEffect, useState } from 'react';
import BasicWrapper from '../../Components/Wrapper/BasicWrapper';
import DataTable from '../../Components/DataTable/DataTable';
import Tooltip from '@mui/material/Tooltip';
import IconButton from '@mui/material/IconButton';
import AddIcon from '@mui/icons-material/Add';
import EditIcon from '@mui/icons-material/Edit';
import DeleteIcon from '@mui/icons-material/Delete';
import VisibilityIcon from '@mui/icons-material/Visibility';
import {useNavigate} from 'react-router-dom';
import useCoursesRequest from '../../Request/CoursesRequest/useCoursesRequest';
import { AuthContext } from '../../Providers/Auth/AuthProvider';

const Courses = () => {
    const { showAlert } = useContext(AuthContext);
    const navigate = useNavigate();
    const {index, deleted} = useCoursesRequest();
    const [Row, setRow] = useState([]);
    const [IsLoading, setIsLoading] = useState(false);

    const getData = useCallback(
      () => {
        index().then(res=>{
            setRow(res);
            setIsLoading(false);
        });
      },
      [],
    )

    useEffect(() => {
        setIsLoading(true);
        getData();
    }, []);

    const handleDelete = (id) => {
        deleted(id).then(res=>{
            if (res) {
                getData();
                showAlert("success", "Operation Successfull");
            }
        })
    }

    const columns = [
        {
            field: 'title',
            headerName: 'Title',
        },
        {
            field: 'sub_title',
            headerName: 'Subtitle',
        },
        {
            field: 'code',
            headerName: 'Course Code',
        },
        {
            field: 'created_at',
            headerName: 'Created Date',
        },
        {
            field: 'updated_at',
            headerName: 'Updated Date',
        },
        {
            field: 'actions',
            headerName: 'Actions',

            renderCell: (params) => {
                const title = params.row.title.split(' ').join('.');
                return (
                    <div style={{ display: 'flex' }}>
                        <Tooltip title='Edit' placement='top'>
                            <IconButton size='small' color='primary' onClick={() => {navigate('edit/'+title, { state: params.row });}}>
                                <EditIcon />
                            </IconButton>
                        </Tooltip>
                        <Tooltip title='Delete' placement='top'>
                            <IconButton size='small' color='primary' onClick={() => {handleDelete(params.row.id)}}>
                                <DeleteIcon  />
                            </IconButton>
                        </Tooltip>
                    </div>
                )
            }
        },
    ];
  return (
      <BasicWrapper>
        <DataTable
            columns={columns}
            rows={Row}
            title="Courses"
            loading={IsLoading}
            customHeaderComponents={
                [
                    <Tooltip title="ADD">
                        <IconButton color='primary' onClick={()=>navigate('create')}>
                            <AddIcon />
                        </IconButton>
                    </Tooltip>,
                ]
            }
        />
      </BasicWrapper>
  )
}

export default memo(Courses)
