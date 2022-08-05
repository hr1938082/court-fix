import useRequest from '../useRequest';
const useCourseChapterRequest = () => {
    const {get, post} = useRequest();
    const baseRoute = '/courses/chapters';

    const index = async() => {
        const res = await get(baseRoute+'/');
        return await res;
    }

    const findByCourseId = async(id) => {
        const res = await get(baseRoute+'/'+id);
        return await res;
    }

    const store = async(data) => {
        const res = await post(baseRoute+'/store',data);
        return await res;
    }

    const update = async(data) => {
        const res = await post(baseRoute+'/update',data);
        return await res;
    }

    const deleted = async(id) => {
        const res = await get(baseRoute+'/delete/'+id);
        return await res;
    }

    return { index, findByCourseId, store, update, deleted }
}

export default useCourseChapterRequest
