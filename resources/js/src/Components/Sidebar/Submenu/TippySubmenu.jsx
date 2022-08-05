import React, { memo } from "react";
import PropTypes from "prop-types";
import Tippy from "@tippyjs/react";
import "tippy.js/dist/tippy.css";
import "tippy.js/themes/light.css";
import List from "@mui/material/List";
import ListItem from "@mui/material/ListItem";
import ListItemButton from "@mui/material/ListItemButton";
import ListItemIcon from "@mui/material/ListItemIcon";
import ListItemText from "@mui/material/ListItemText";
import { useNavigate, useLocation } from "react-router-dom";
import "./tippysubmenu.css";

const SubmenuContent = (props) => {
  const navigate = useNavigate();
  const {pathname} = useLocation();
  const { data, title } = props;
  return (
    <List>
      {title && (
        <ListItem disablePadding>
          <ListItemText
            sx={{ pl: "20px" }}
            primaryTypographyProps={{ fontWeight: "600", fontSize: "15px" }}
            primary={title}
          ></ListItemText>
        </ListItem>
      )}
      {data.map((val, index) => {
        return (
          <ListItem disablePadding key={index} sx={{
            position:'relative',
            backgroundColor: (pathname === val.link) && 'rgba(0,0,0,0.1)',
            '&::before':{
              content:'""',
              position: 'absolute',
              right:0,
              top:0,
              height:'100%',
              width: pathname === val.link ? '3px' : 0,
              backgroundColor:'primary.main'
            }
            }}>
            <ListItemButton
              sx={{ py: "4px" }}
              onClick={() => navigate(val.link)}
            >
              <ListItemIcon
                sx={{ minWidth: "30px", " & svg": { fontSize: "21px" },  color: pathname === val.link ? 'primary.main' : 'black' }}
              >
                {val.icon}
              </ListItemIcon>
              <ListItemText
                sx={{ color: pathname === val.link ? 'primary.main' : 'black'}}
                primaryTypographyProps={{ fontSize: "15px" }}
                primary={val.title}
              />
            </ListItemButton>
          </ListItem>
        );
      })}
    </List>
  );
};

function TippySubmenu(props) {
  const { children, data, title } = props;
  return (
    <Tippy
      theme="light"
      content={<SubmenuContent data={data} title={title} />}
      arrow
      allowHTML
      placement="right-start"
      interactive={true}
      appendTo={document.body}
    >
      {children}
    </Tippy>
  );
}

TippySubmenu.propTypes = {
  children: PropTypes.node.isRequired,
  data: PropTypes.array.isRequired,
  title: PropTypes.string,
  sticky: PropTypes.bool,
};

SubmenuContent.propTypes = {
  data: PropTypes.array.isRequired,
  title: PropTypes.string,
};

export default memo(TippySubmenu);
