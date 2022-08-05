import { memo } from "react";
import { styled } from "@mui/system";

const BasicWrapper = styled('div')({
    height: 'calc(100vh - 81px)',
    width: '100%',
    display: "flex",
    justifyContent: "center",
    alignItems: "center",
    padding: '2rem',
    overflow:'auto'
})

export default memo(BasicWrapper)
