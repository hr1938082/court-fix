import useRequest from "../useRequest";
const useCoursesRequest = () => {
    const {get, post} = useRequest();
    const baseRoute = '/courses';

    const index = async() => {
        const  res = get(baseRoute+'/');
        return await res;
    }

    const totalCourses = async()=>{
        const res = await get(`${baseRoute}/total_courses`);
        return await res;
    }

    const select = async() => {
        const res = get(baseRoute+'/select');
        return await res;
    }

    const store = async(data) => {
        const res = post(baseRoute+'/store',data);
        return await res;
    }

    const update = async(data) => {
        const res = post(baseRoute+'/update',data);
        return await res;
    }

    const deleted = async(id) => {
        const  res = get(baseRoute+'/delete/'+id);
        return await res;
    }

    return { index, totalCourses, select, store, update, deleted };
}

export default useCoursesRequest
