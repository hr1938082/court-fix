import React, {memo} from 'react';
import SearchIcon from '@mui/icons-material/Search';
import ClearIcon from '@mui/icons-material/Clear';
import Box from '@mui/material/Box';

const Header = (props) => {
    const { title, customHeaderComponents, SearchText, onChangeSearch, clearSearch } = props;
    return (
        <Box className='data-table-header'>
            <Box className="title">{title}</Box>
            <ul className="toolbar">
                <li>
                    <Box  className="search">
                        <SearchIcon className='search-icon' />
                        <input style={{backgroundColor:'#f4f4f4'}} type="text" placeholder='Search' value={SearchText} onChange={onChangeSearch} />
                        <ClearIcon className='search-icon clear' onClick={clearSearch} />
                    </Box>
                </li>
                {
                    customHeaderComponents ? (
                        Array.isArray(customHeaderComponents) ? (
                            customHeaderComponents.map((val, index) => {
                                return (
                                    <li key={index}>
                                        {val}
                                    </li>
                                );
                            })
                        ) : (
                            <li>
                                <customHeaderComponents />
                            </li>
                        )
                    ) : ('')
                }
            </ul>
        </Box>
    );
};

export default memo(Header);
