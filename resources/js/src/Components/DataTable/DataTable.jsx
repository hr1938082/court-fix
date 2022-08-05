import React, { memo, useLayoutEffect, useState } from 'react';
import { DataGrid } from '@mui/x-data-grid';
import Header from './Header';
import './StyleDataTable.scss';
import LinearProgress from '@mui/material/LinearProgress';
import Box from '@mui/material/Box';
function escapeRegExp(value) {
    return value.replace(/[-[\]{}()*+?.,\\^$|#\s]/g, '\\$&');
}

const DataTable = (props) => {
    const { columns, rows, title, customHeaderComponents, height ,rowsPerPage, loading } = props;
    const [SearchText, setSearchText] = useState('');
    const [Columns, setColumns] = useState([]);
    const [Rows, setRows] = useState([]);
    const [PageSize, setPageSize] = useState(rowsPerPage ? rowsPerPage : 7);
    const handleChangeSearch = (value) => {
        setSearchText(value);
        const searchRegex = new RegExp(escapeRegExp(value), 'i');
        const filteredRows = rows.filter((row) => {
            return Object.keys(row).some((field) => {
                const value = row[field];
                return searchRegex.test(value ? value.toString() : '');
            });
        });
        setRows(filteredRows);
    }
    useLayoutEffect(() => {
        const data = columns.map(val=>{
            return {
                ...val,
                minWidth: 150,
                flex: 1
                }
        });
        setColumns(data);
        handleChangeSearch('');
    }, [rows,loading]);

    return (
        <Box sx={{ height: height ? height : '550px', width: '100%' }}>
            <Box sx={{ display: 'flex', height: '100%' }}>
                <Box sx={{ flexGrow: 1, bgcolor:'background.default', boxShadow:'0 0 10px rgba(0,0,0,.2 )' }}>
                    <DataGrid
                        density='compact'
                        disableSelectionOnClick
                        columns={Columns}
                        rows={Rows}
                        components={{
                            Toolbar: Header,
                            LoadingOverlay: LinearProgress,
                        }}
                        componentsProps={
                            {
                                toolbar: {
                                    title: title,
                                    customHeaderComponents: customHeaderComponents,
                                    SearchText: SearchText,
                                    onChangeSearch: (e) => handleChangeSearch(e.target.value),
                                    clearSearch: () => handleChangeSearch(''),
                                },
                            }
                        }
                        loading={loading}
                        pageSize={PageSize}
                        onPageSizeChange={(newPageSize) => setPageSize(newPageSize)}
                        rowsPerPageOptions={[ rowsPerPage ? rowsPerPage : 7, 14, 21]}
                        pagination
                    />
                </Box>
            </Box>
        </Box>
    )
};

export default memo(DataTable);
