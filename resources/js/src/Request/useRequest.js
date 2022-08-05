import { useContext } from "react";
import { baseURL } from "../Constants";
import { AuthContext } from "../Providers/Auth/AuthProvider";
const useRequest = () => {
    const Exception = useContext(AuthContext);
    const token = localStorage.getItem('CISessionToken');
    const requestValidator = (data) => {
        if (data) {
            if (data.hasOwnProperty('message') && Object.keys(data).length === 1) {
                Exception.clearData();
            }else{
                if (data.status === true) {
                    if (Object.keys(data).length > 1) {
                        if (data.hasOwnProperty('message')) {
                            return data.message;
                        }else{
                            return data.data;
                        }
                    } else {
                        return data.status;
                    }
                } else {
                    if (data.type === 'user') {
                        return data
                    }else{
                        if (Exception !== undefined) {
                            Exception.showException(data.type, data.message)
                        }else{
                            return data;
                        }
                    }
                }
            }
        } else {
            console.log("Request Failed....!!");
        }
    }
    const get = async(mainURL, paramToken) => {
        const request = await fetch(baseURL + '/api' + mainURL,
            {
                method: 'GET',
                headers: {
                    'Authorization': `Bearer ${token ? token : paramToken}`,
                    "Accept": "application/json",

                }
            })
        const res = await request.json();
        return requestValidator(await res)
    }

    const post = async(mainURL,body) => {
        const data = await axios.get(baseURL + '/sanctum/csrf-cookie').then(()=>(
            axios({
                method: "post",
                url: baseURL + '/api' + mainURL,
                headers: {
                    'Authorization': `Bearer ${token ? token : ""}`,
                    "Accept": "application/json",
                    "Content-Type": "application/json",
                },
                data: JSON.stringify(body)
            }).then( res => requestValidator(res.data) )
        ))
        return await data
    }

    const videoUpload = async (params,body) => {
        const data = await axios.get(baseURL + '/sanctum/csrf-cookie').then(()=>(
            axios({
                method: "post",
                url: baseURL + '/api/video.upload?'+params.toString(),
                headers: {
                    'Authorization': `Bearer ${token ? token : ""}`,
                    // "Accept": "application/json",
                    'Content-Type':'application/octet-stream'
                },
                data: body
            }).then( res => console.log(res) )
        ))
        // return await data
    }
    return {get, post, videoUpload}
}

export default useRequest
