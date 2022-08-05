import { createContext, useCallback, useEffect, useState } from "react";
import { useNavigate } from "react-router-dom";
import { baseURL } from "../../Constants";
import useAuthRequest from "../../Request/AuthRequest/useAuthRequest";

export const AuthContext = createContext();

const AuthProvider = () => {
    const navigate = useNavigate();
    const { UserData, Logout } = useAuthRequest();
    const [Auth, setAuth] = useState({
        data: {},
        FetchException: {
            status: false,
            type: "",
            message: "",
        }
    });
    const [Alert, setAlert] = useState(
        {
            open:false,
            serverity:"success",
            message: "",
            HideDuration: 4000
        })



    const showException = (type, message) => {
        setAuth({ ...Auth, FetchException: { status: true, type, message } });
    }

    const saveData = useCallback(
        (token) => {
            UserData(token).then(res => {
                if (res.status === false) {
                    showException(res.type, res.message);
                } else {

                    setAuth({ ...Auth, data: {...res, image: res.image ? baseURL+'/'+res.image :""} })
                }
            });
        },
        [],
    )

    const saveToken = (token) => {
        localStorage.setItem('CISessionToken', token)
        saveData(token);
    }

    const clearData = () => {
        localStorage.clear();
        navigate('/admin/login');
    }

    const logout = () => {
        Logout().then(res=>{
            if (res) {
                clearData()
            }
        })
    }

    useEffect(() => {
        if (localStorage.getItem("CISessionToken")) {
            saveData();
        }
    }, []);


    const hideException = () => {
        setAuth({ ...Auth, FetchException: { status: false, type: "", message: "" } });
    }

    const hideAlert = () => {
        setAlert({open: false, serverity: Alert.serverity, message: "", HideDuration:Alert.HideDuration});
    }
    const showAlert = (serverity, message) => {
        setAlert({open:true, serverity, message, HideDuration:Alert.HideDuration});
        const hide = setTimeout(hideAlert,Alert.HideDuration,);
        clearTimeout(hide);
    }

    return { Auth,Alert, saveToken,saveData, showException, hideException,clearData, logout, showAlert, hideAlert }
}

export default AuthProvider
