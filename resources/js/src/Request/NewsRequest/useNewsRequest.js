import useRequest from "../useRequest"
const useNewsRequest = () => {
    const {get, post} = useRequest();
    const baseRoute = '/news';
    const index = async()=>{
        const res = await get(baseRoute+'/');
        return await res;
    }
    const store = async(data) => {
        const res = await post(baseRoute+'/store',data);
        return await res;
    }

    const getNewsById = async(id) => {
        const res = await get(baseRoute+'/'+id);
        return res;
    }

    const update = async(data)=>{
        const res = await post(baseRoute+'/update',data);
        return await res;
    }

    const deleted = async(id) => {
        const res = await get(baseRoute+'/delete/'+id);
        return await res;
    }
  return {index, store, getNewsById, update, deleted}
}

export default useNewsRequest
