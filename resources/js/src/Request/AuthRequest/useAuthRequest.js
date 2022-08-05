import useRequest from "../useRequest";

const useAuthRequest = () => {
    const {get, post} = useRequest();
    const Login = async(data) => {
        const res = post('/login',data);
        return await res;
    }

    const UserData = async(token) => {
        const res = await get('/auth.data',token);
        return await res;
    }

    const updateProfile = async(data) => {
        const res = await post('/update.profile',data);
        return await res;
    }

    const Logout = async() => {
        const res = await get('/logout');
        return await res;
    }

    const verifyUser = async(data) => {
        const res = await post('/verify.user',data);
        return await res;
    }

    return {Login, UserData, updateProfile, Logout, verifyUser}
}

export default useAuthRequest
