import useRequest from "../useRequest"
const useUserRequest = () => {
    const {get, post} = useRequest();
    const baseRoute = '/users'

    const index = async()=>{
        const res = await get(`${baseRoute}/`);
        return await res;
    }

    const totalUsers = async()=>{
        const res = await get(`${baseRoute}/total_users`);
        return await res;
    }

    const create = async(data)=>{
        const res = await post(`${baseRoute}/create`,data);
        return await res;
    }

    const statChange = async(id)=>{
        const res = await get(`${baseRoute}/stat.change/`+id);
        return await res
    }

    const changeUserPassword = async(data) => {
        const res = await post(`${baseRoute}/change.password`,data);
        return await res;
    }

    const verifyUser = async(id) => {
        const res = await get(`${baseRoute}/verify/${id}`);
        return await res;
    }

    return {index, totalUsers, create, statChange, changeUserPassword, verifyUser};
}

export default useUserRequest
