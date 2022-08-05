import { memo } from "react";
import { styled } from "@mui/system";

const HorizontalCenterWrapper = styled('div')({
    width: '100%',
    display: "flex",
    justifyContent: "space-around",
    padding: '2rem',
})

export default memo(HorizontalCenterWrapper)
