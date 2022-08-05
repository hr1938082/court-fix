import React, { memo, useCallback, useContext, useEffect, useRef, useState } from 'react';
import BasicWrapper from '../../Components/Wrapper/BasicWrapper';
import DataTable from '../../Components/DataTable/DataTable';
import Tooltip from '@mui/material/Tooltip';
import IconButton from '@mui/material/IconButton';
import AddIcon from '@mui/icons-material/Add';
import ThumbUpRoundedIcon from '@mui/icons-material/ThumbUpRounded';
import VisibilityIcon from '@mui/icons-material/Visibility';
import { useNavigate } from 'react-router-dom';
import { AuthContext } from '../../Providers/Auth/AuthProvider';
import useUserRequest from '../../Request/UserRequest/useUserRequest';
import Box from '@mui/material/Box';
import DoneOutlineRoundedIcon from '@mui/icons-material/DoneOutlineRounded';
import CloseRoundedIcon from '@mui/icons-material/CloseRounded';
import KeyRoundedIcon from '@mui/icons-material/KeyRounded';
import VerifyItsYou from '../../Components/VerifyItsYou/VerifyItsYou';
import ChangeUserPassword from './ChangeUserPassword';

const Users = () => {
    const verifyButton = useRef(null);
    const { showAlert } = useContext(AuthContext);
    const navigate = useNavigate();
    const { index, statChange, verifyUser } = useUserRequest();
    const [Row, setRow] = useState([]);
    const [IsLoading, setIsLoading] = useState(false);
    const [OpenPasswordDialog, setOpenPasswordDialog] = useState(false);
    const [UserIdToChangePassword, setUserIdToChangePassword] = useState(null);

    const getData = useCallback(
        () => {
            index().then(res => {
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

    const handleDelete = (id, status) => {
        statChange(id).then(res => {
            if (res) {
                setRow([]);
                setIsLoading(true);
                getData();
                showAlert("success", status ? 'User Inactivated' : 'User Activated');
            }
        })
    }

    const handleApproveUser = (id) => {
        verifyUser(id).then(res=>{
            if (res) {
                setRow([]);
                setIsLoading(true);
                getData();
                showAlert("success","User Verified");
            }
        })
    }



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
            field: 'verified',
            headerName: 'Verified',
            renderCell: (params) => {
                return (params.row.verified === false ? <Box color='error.main' >Unverified</Box> : <Box color="success.main">Verified</Box>)
            }
        },
        {
            field: 'status',
            headerName: 'Status',
            renderCell: (params) => {
                return (params.row.status ? <Box color="success.main">Active</Box> : <Box color='error.main' >Inactive</Box>)
            }
        },
        {
            field: 'actions',
            headerName: 'Actions',

            renderCell: (params) => {
                return (
                    <div style={{ display: 'flex' }}>
                        {
                            params.row.verified !== true && (
                                <Tooltip title='Verify User' placement='top'>
                                    <IconButton size='small' color='primary' onClick={()=>handleApproveUser(params.row.id)}>
                                        <ThumbUpRoundedIcon />
                                    </IconButton>
                                </Tooltip>
                            )
                        }
                        <Tooltip title='Edit' placement='top'>
                            <IconButton size='small' color='primary' onClick={() => { navigate('view/' + params.row.name, { state: params.row }); }}>
                                <VisibilityIcon />
                            </IconButton>
                        </Tooltip>
                        <Tooltip title='Change Password' placement='top'>
                            <IconButton size='small' color='primary' onClick={() => { verifyButton.current.handleOpen(); setUserIdToChangePassword(params.row.id) }}>
                                <KeyRoundedIcon />
                            </IconButton>
                        </Tooltip>
                        <Tooltip title={params.row.status ? 'Inactive User' : 'Active User'} placement='top'>
                            <IconButton size='small' color='primary' onClick={() => { handleDelete(params.row.id, params.row.status) }}>
                                {
                                    params.row.status ? (
                                        <CloseRoundedIcon />
                                    ) : (
                                        <DoneOutlineRoundedIcon />
                                    )
                                }
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
                title="Users"
                loading={IsLoading}
                customHeaderComponents={
                    [
                        <Tooltip title="ADD">
                            <IconButton color='primary' onClick={() => navigate('create')}>
                                <AddIcon />
                            </IconButton>
                        </Tooltip>,
                    ]
                }
            />
            <VerifyItsYou ref={verifyButton} setVerify={setOpenPasswordDialog} />
            <ChangeUserPassword Open={OpenPasswordDialog} setOpen={setOpenPasswordDialog} id={UserIdToChangePassword} />
        </BasicWrapper>
    )
}

export default memo(Users);
