import { styled } from "@mui/system";
import { memo } from "react";

const FullPageWrapper = styled('div')({
    height: '100vh',
    width: '100%',
    display: "flex",
    justifyContent: "center",
    alignItems: "center",
    padding: '0 2rem',
})

export default memo(FullPageWrapper)
